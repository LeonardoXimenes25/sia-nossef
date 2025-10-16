<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectAssignmentResource\Pages;
use App\Filament\Resources\SubjectAssignmentResource\RelationManagers;
use App\Models\SubjectAssignment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectAssignmentResource extends Resource
{
    protected static ?string $model = SubjectAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('teacher_id')
                ->label('Professor')
                ->relationship('teacher', 'name')
                ->required(),

            Forms\Components\Select::make('subject_id')
                ->label('Materia')
                ->relationship('subject', 'name')
                ->required(),

            Forms\Components\Select::make('class_room_id')
                ->label('Kelas / Turma')
                ->options(function () {
                    return \App\Models\ClassRoom::with('major')
                        ->get()
                        ->mapWithKeys(fn($classRoom) => [
                            $classRoom->id => $classRoom->level.' '.$classRoom->major->name.' '.$classRoom->turma
                        ]);
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher.name')->label('Guru')->sortable(),Tables\Columns\TextColumn::make('subject.name')->label('Mata Pelajaran'),Tables\Columns\TextColumn::make('classRoom.major.name')->label('Jurusan'),Tables\Columns\TextColumn::make('classRoom.level')->label('Kelas'),Tables\Columns\TextColumn::make('classRoom.turma')->label('Turma'),Tables\Columns\TextColumn::make('academicYear.name')->label('Tahun Ajaran'),Tables\Columns\TextColumn::make('period.name')->label('Periode'),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubjectAssignments::route('/'),
            'create' => Pages\CreateSubjectAssignment::route('/create'),
            'edit' => Pages\EditSubjectAssignment::route('/{record}/edit'),
        ];
    }
}
