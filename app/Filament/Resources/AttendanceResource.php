<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance;
use App\Models\ClassRoom;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\ViewField;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Absensi';
    protected static ?string $pluralModelLabel = 'Absensi';

    // Property untuk menampung siswa
    public $students = [];

    // Form Absensi
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Pilih kelas + turma
                Forms\Components\Select::make('class_room_id')
                    ->label('Kelas / Turma')
                    ->options(function () {
                        return ClassRoom::with('major')->get()->mapWithKeys(function ($classRoom) {
                            return [
                                $classRoom->id =>
                                    $classRoom->level . ' ' .
                                    $classRoom->turma . ' (' .
                                    $classRoom->major->name . ')',
                            ];
                        });
                    })
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(function ($state, $set) {
                        $students = Student::where('class_room_id', $state)
                            ->orderBy('name')
                            ->get(['id', 'name'])
                            ->map(function ($student) {
                                return [
                                    'id' => $student->id,
                                    'name' => $student->name,
                                    'status' => 'presente', // default hadir
                                ];
                            })
                            ->toArray();

                        $set('students', $students); // pastikan semua siswa tersimpan
                    }),

                // Pilih tanggal absensi
                Forms\Components\DatePicker::make('date')
                    ->label('Tanggal')
                    ->default(now())
                    ->required(),

                // Daftar siswa + status absensi
                Forms\Components\ViewField::make('students')
                    ->view('filament.forms.components.students-attendance-table')
                    ->label('Daftar Siswa')
                    ->columnSpan('full')
                    ->reactive()
                    // Hapus afterStateHydrated yang mengosongkan state
            ]);
    }

    // Tabel absensi
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->label('Nama Siswa')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('classRoom.level')->label('Kelas')->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => ucfirst($state))
                    ->colors([
                        'success' => fn($state) => $state === 'presente',
                        'primary' => fn($state) => $state === 'moras',
                        'warning' => fn($state) => $state === 'lisensa',
                        'danger' => fn($state) => $state === 'falta',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->date()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'presente' => 'Presente',
                        'moras' => 'Moras',
                        'lisensa' => 'Lisensa',
                        'falta' => 'Falta',
                    ])
                    ->label('Status'),
                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('from')->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('until')->label('Sampai Tanggal'),
                    ])
                    ->query(fn(Builder $query, array $data) => $query
                        ->when($data['from'] ?? null, fn($q, $date) => $q->whereDate('date', '>=', $date))
                        ->when($data['until'] ?? null, fn($q, $date) => $q->whereDate('date', '<=', $date))
                    ),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
