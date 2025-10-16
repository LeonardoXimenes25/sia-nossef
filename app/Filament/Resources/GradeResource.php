<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeResource\Pages;
use App\Models\Grade;
use App\Models\SubjectAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Murid')
                    ->relationship('student', 'name')
                    ->required(),
                
                    Forms\Components\Select::make('subject_assignment_id')
    ->label('Guru / Mata Pelajaran / Kelas / Jurusan')
    ->options(function () {
        return \App\Models\SubjectAssignment::with(['teacher', 'subject', 'classRoom.major'])
            ->get()
            ->filter(fn($assignment) => $assignment->teacher && $assignment->subject && $assignment->classRoom && $assignment->classRoom->major)
            ->mapWithKeys(fn($assignment) => [
                $assignment->id => $assignment->teacher->name
                    .' - '.$assignment->subject->name
                    .' - '.$assignment->classRoom->level.' '.$assignment->classRoom->turma
                    .' / '.$assignment->classRoom->major->name,
            ])
            ->toArray();
    })
    ->searchable()
    ->required(),


                Forms\Components\Select::make('academic_year_id')
                    ->label('Tahun Ajaran')
                    ->relationship('academicYear', 'name')
                    ->required(),

                Forms\Components\Select::make('period_id')
                    ->label('Periode')
                    ->relationship('period', 'name')
                    ->required(),

                Forms\Components\TextInput::make('score')
                    ->label('Nilai')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10)
                    ->required()
                    ->placeholder('Masukkan nilai 0–10'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->label('Nama Murid')->sortable(),
                Tables\Columns\TextColumn::make('subjectAssignment.subject.name')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('subjectAssignment.teacher.name')->label('Guru'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.level')->label('Kelas'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.turma')->label('Turma'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.major.name')->label('Jurusan'),
                Tables\Columns\TextColumn::make('academicYear.name')->label('Tahun Ajaran'),
                Tables\Columns\TextColumn::make('period.name')->label('Periode'),
                Tables\Columns\TextColumn::make('score')->label('Nilai')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
