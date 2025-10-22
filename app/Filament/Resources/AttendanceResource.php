<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance;
use App\Models\SubjectAssignment;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $modelLabel = 'Absensi';
    protected static ?string $navigationLabel = 'Absensia';
    protected static ?string $pluralModelLabel = 'Lista Absensia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Kelas')
                    ->description('Pilih kelas dan tanggal absensi')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('subject_assignment_id')
                                    ->label('Kelas / Mata Pelajaran')
                                    ->options(
                                        SubjectAssignment::with(['teacher', 'subject', 'classRoom.major'])
                                            ->get()
                                            ->mapWithKeys(function($item) {
                                                return [
                                                    $item->id => ($item->classRoom->level ?? '-') 
                                                        .' '.($item->classRoom->turma ?? '-') 
                                                        .' - '.($item->subject->name ?? '-')
                                                        .' ('.($item->teacher->name ?? '-').')'
                                                ];
                                            })
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->reactive()
                                    ->required()
                                    ->columnSpan(1)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('students_attendance', []);
                                    }),

                                DatePicker::make('date')
                                    ->label('Tanggal Absensi')
                                    ->displayFormat('d F Y')
                                    ->default(now())
                                    ->required()
                                    ->columnSpan(1),
                            ]),
                    ])
                    ->collapsible(),

                Section::make('Daftar Kehadiran Siswa')
                    ->description('Klik status kehadiran untuk setiap siswa')
                    ->schema([
                        Placeholder::make('info')
                            ->content(function (callable $get) {
                                $subjectAssignmentId = $get('subject_assignment_id');
                                if (!$subjectAssignmentId) {
                                    return 'Pilih kelas terlebih dahulu untuk menampilkan daftar siswa';
                                }
                                
                                $subjectAssignment = SubjectAssignment::with(['classRoom.students', 'teacher', 'subject'])->find($subjectAssignmentId);
                                if (!$subjectAssignment) return '';
                                
                                $studentCount = $subjectAssignment->classRoom->students->count() ?? 0;
                                $studentsData = $get('students_attendance') ?? [];
                                
                                $presentCount = collect($studentsData)->where('status', 'present')->count();
                                $sickCount = collect($studentsData)->where('status', 'sick')->count();
                                $permissionCount = collect($studentsData)->where('status', 'permission')->count();
                                $absentCount = collect($studentsData)->where('status', 'absent')->count();
                                
                                return "Total {$studentCount} siswa | ✅ Hadir: {$presentCount} | 🤒 Sakit: {$sickCount} | 📝 Izin: {$permissionCount} | ❌ Alpha: {$absentCount}";
                            })
                            ->reactive(),

                        // Container untuk daftar siswa
                        Forms\Components\Group::make()
                            ->schema([
                                static::getStudentsAttendanceRepeater(),
                            ])
                            ->visible(fn (callable $get) => !empty($get('subject_assignment_id')))
                    ])
                    ->collapsible(),
            ]);
    }

    protected static function getStudentsAttendanceRepeater(): Forms\Components\Repeater
    {
        return Repeater::make('students_attendance')
            ->label('')
            ->schema([
                Grid::make(5)
                    ->schema([
                        Hidden::make('student_id'),
                        
                        TextInput::make('student_name')
                            ->label('Nama Siswa')
                            ->disabled()
                            ->columnSpan(2),
                        
                        ToggleButtons::make('status')
                            ->label('Status Kehadiran')
                            ->options([
                                'present' => 'Hadir',
                                'sick' => 'Sakit',
                                'permission' => 'Izin',
                                'absent' => 'Alpha',
                            ])
                            ->colors([
                                'present' => 'success',
                                'sick' => 'warning',
                                'permission' => 'primary',
                                'absent' => 'danger',
                            ])
                            ->icons([
                                'present' => 'heroicon-s-check-circle',
                                'sick' => 'heroicon-s-heart',
                                'permission' => 'heroicon-s-document-text',
                                'absent' => 'heroicon-s-x-circle',
                            ])
                            ->grouped()
                            ->inline()
                            ->required()
                            ->columnSpan(3)
                            ->default('present'),
                    ])
            ])
            ->default(function (callable $get) {
                $subjectAssignmentId = $get('subject_assignment_id');
                if (!$subjectAssignmentId) return [];

                $subjectAssignment = SubjectAssignment::with('classRoom.students')->find($subjectAssignmentId);
                if (!$subjectAssignment || !$subjectAssignment->classRoom) return [];

                // Ambil semua siswa dan buat array untuk repeater
                return $subjectAssignment->classRoom->students
                    ->sortBy('name')
                    ->map(function($student) {
                        return [
                            'student_id' => $student->id,
                            'student_name' => $student->name,
                            'status' => 'present', // Default hadir
                        ];
                    })->toArray();
            })
            ->reactive()
            ->itemLabel(fn (array $state): ?string => $state['student_name'] ?? 'Siswa')
            ->grid(1)
            ->minItems(1)
            ->disableItemMovement() // Nonaktifkan reorder
            ->disableItemDeletion() // Nonaktifkan hapus
            ->disableItemCreation(); // Nonaktifkan tambah
    }

    // ALTERNATIF: Versi dengan Grid langsung (lebih simple)
    public static function getGridVersion(): Forms\Components\Grid
    {
        return Grid::make(1)
            ->schema(function (callable $get) {
                $subjectAssignmentId = $get('subject_assignment_id');
                if (!$subjectAssignmentId) return [];

                $subjectAssignment = SubjectAssignment::with('classRoom.students')->find($subjectAssignmentId);
                if (!$subjectAssignment || !$subjectAssignment->classRoom) return [];

                $students = $subjectAssignment->classRoom->students->sortBy('name');
                
                $fields = [];
                foreach ($students as $index => $student) {
                    $fields[] = Grid::make(5)
                        ->schema([
                            TextInput::make("students_attendance.{$index}.student_name")
                                ->label('Nama Siswa')
                                ->default($student->name)
                                ->disabled()
                                ->columnSpan(2),
                                
                            Hidden::make("students_attendance.{$index}.student_id")
                                ->default($student->id),
                                
                            ToggleButtons::make("students_attendance.{$index}.status")
                                ->label('Status')
                                ->options([
                                    'present' => 'Hadir',
                                    'sick' => 'Sakit',
                                    'permission' => 'Izin',
                                    'absent' => 'Alpha',
                                ])
                                ->colors([
                                    'present' => 'success',
                                    'sick' => 'warning', 
                                    'permission' => 'primary',
                                    'absent' => 'danger',
                                ])
                                ->default('present')
                                ->grouped()
                                ->inline()
                                ->required()
                                ->columnSpan(3),
                        ])
                        ->columnSpanFull();
                }
                
                return $fields;
            })
            ->visible(fn (callable $get) => !empty($get('subject_assignment_id')))
            ->reactive();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'present' => 'Hadir',
                        'sick' => 'Sakit',
                        'permission' => 'Izin', 
                        'absent' => 'Alpha',
                    })
                    ->colors([
                        'success' => 'present',
                        'warning' => 'sick',
                        'primary' => 'permission',
                        'danger' => 'absent',
                    ]),

                Tables\Columns\TextColumn::make('subjectAssignment.subject.name')
                    ->label('Mapel')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.level')
                    ->label('Kelas')
                    ->formatStateUsing(function ($record) {
                        $classRoom = $record->subjectAssignment->classRoom;
                        return ($classRoom->level ?? '') . ' ' . ($classRoom->turma ?? '');
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'present' => 'Hadir',
                        'sick' => 'Sakit',
                        'permission' => 'Izin',
                        'absent' => 'Alpha',
                    ]),

                SelectFilter::make('subject_assignment_id')
                    ->label('Kelas')
                    ->options(
                        SubjectAssignment::with(['classRoom'])
                            ->get()
                            ->mapWithKeys(function($item) {
                                return [
                                    $item->id => ($item->classRoom->level ?? '-') 
                                        .' '.($item->classRoom->turma ?? '-')
                                ];
                            })
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateHeading('Belum ada absensi')
            ->emptyStateDescription('Buat absensi baru untuk mulai mencatat kehadiran')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Absensi Baru'),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}