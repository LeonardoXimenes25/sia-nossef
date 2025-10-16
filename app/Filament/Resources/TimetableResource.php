<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetableResource\Pages;
use App\Models\Timetable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_assignment_id')
                    ->label('Guru / Mata Pelajaran / Kelas')
                    ->options(\App\Models\SubjectAssignment::with(['teacher', 'subject', 'classRoom', 'classRoom.major'])->get()->mapWithKeys(function($item) {
                        return [
                            $item->id => $item->teacher->name
                                .' - '.$item->subject->name
                                .' - '.$item->classRoom->level
                                .' '.$item->classRoom->turma
                        ];
                    }))
                    ->required(),

                Forms\Components\Select::make('day')
                    ->label('Hari')
                    ->options([
                        'Monday' => 'Senin',
                        'Tuesday' => 'Selasa',
                        'Wednesday' => 'Rabu',
                        'Thursday' => 'Kamis',
                        'Friday' => 'Jumat',
                        'Saturday' => 'Sabtu',
                    ])
                    ->required(),

                Forms\Components\TimePicker::make('start_time')->required(),
                Forms\Components\TimePicker::make('end_time')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subjectAssignment.teacher.name')->label('Guru'),
                Tables\Columns\TextColumn::make('subjectAssignment.subject.name')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.level')->label('Kelas'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.turma')->label('Turma'),
                Tables\Columns\TextColumn::make('subjectAssignment.classRoom.major.name')->label('Jurusan'),
                Tables\Columns\TextColumn::make('day')->label('Hari'),
                Tables\Columns\TextColumn::make('start_time')->label('Mulai'),
                Tables\Columns\TextColumn::make('end_time')->label('Selesai'),
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

    // Eager load relasi supaya kolom nested muncul
    public static function getTableQuery(): Builder
    {
        return parent::getTableQuery()->with([
            'subjectAssignment.teacher',
            'subjectAssignment.subject',
            'subjectAssignment.classRoom.major',
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
            'index' => Pages\ListTimetables::route('/'),
            'create' => Pages\CreateTimetable::route('/create'),
            'edit' => Pages\EditTimetable::route('/{record}/edit'),
        ];
    }
}
