<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Models\Attendance;
use App\Models\SubjectAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('subject_assignment_id')
                    ->label('Kelas / Guru / Mata Pelajaran')
                    ->options(
                        SubjectAssignment::with(['teacher', 'subject', 'classRoom', 'classRoom.major'])
                            ->get()
                            ->mapWithKeys(fn($item) => [
                                $item->id => $item->teacher->name
                                    .' - '.$item->subject->name
                                    .' - '.$item->classRoom->level
                                    .' '.$item->classRoom->turma
                                    .' / '.$item->classRoom->major->name
                            ])
                    )
                    ->reactive() // agar bisa digunakan client-side jika butuh
                    ->required(),

                Select::make('academic_year_id')
                    ->label('Tahun Ajaran')
                    ->relationship('academicYear', 'name')
                    ->required(),

                Select::make('period_id')
                    ->label('Periode')
                    ->relationship('period', 'name')
                    ->required(),

                DatePicker::make('date')
                    ->label('Tanggal')
                    ->required(),

                // Repeater: setiap item mewakili 1 murid + status
                Repeater::make('students_attendance')
                    ->label('Daftar Murid (cek status tiap baris)')
                    ->schema([
                        Hidden::make('student_id'),
                        TextInput::make('student_name')
                            ->label('Nama Murid')
                            ->disabled(),
                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'present' => 'Hadir',
                                'sick' => 'Sakit',
                                'permission' => 'Izin',
                                'absent' => 'Alpha',
                            ])
                            ->required(),
                    ])
                    ->columns(3)
                    ->minItems(0)
                    ->createItemButtonLabel('Tambah baris (opsional)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->label('Murid'),
                Tables\Columns\TextColumn::make('subjectAssignment.subject.name')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('date')->label('Tanggal')->date(),
            ])
            ->filters([])
            ->actions([ Tables\Actions\EditAction::make(), ])
            ->bulkActions([ Tables\Actions\DeleteBulkAction::make() ]);
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
