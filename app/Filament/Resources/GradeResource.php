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
    protected static ?string $navigationLabel = 'Valor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Estudante')
                    ->relationship('student', 'name')
                    ->required(),
                
                Forms\Components\Select::make('subject_assignment_id')
                    ->label('Professor / Materia / Klasse / Area Estudu')
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
                    ->label('Tinan Akademiku')
                    ->relationship('academicYear', 'name')
                    ->required(),

                Forms\Components\Select::make('period_id')
                    ->label('Periodu')
                    ->relationship('period', 'name')
                    ->required(),

                Forms\Components\TextInput::make('score')
                    ->label('Valor')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10)
                    ->required()
                    ->placeholder('Prenxe valor 0–10'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->label('Estudante')->sortable(),
                Tables\Columns\TextColumn::make('subjectAssignment.subject.name')->label('Materia'),
                Tables\Columns\TextColumn::make('subjectAssignment.teacher.name')->label('Professor'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.level')->label('Klasse'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.turma')->label('Turma'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.major.name')->label('Area Estudu'),
                Tables\Columns\TextColumn::make('academicYear.name')->label('Tinan Akademiku'),
                Tables\Columns\TextColumn::make('period.name')->label('Periodu'),
                Tables\Columns\TextColumn::make('score')->label('Valor')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Edita'),
                Tables\Actions\DeleteAction::make()->label('Apaga'),
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
