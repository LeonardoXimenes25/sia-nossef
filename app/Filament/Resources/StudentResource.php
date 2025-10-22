<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Estudante';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nre')
                    ->label('ID Estudante')
                    ->required()
                    ->unique(ignoreRecord: true),
                
                Forms\Components\TextInput::make('name')
                    ->label('Nama Estudante')
                    ->required(),
                
                Forms\Components\Select::make('class_room_id')
                    ->label('Klasse / Turma')
                    ->options(function () {
                        return \App\Models\ClassRoom::with('major')->get()->mapWithKeys(function ($classRoom) {
                            $majorName = $classRoom->major ? $classRoom->major->name : '';
                            return [$classRoom->id => $classRoom->level . ' ' . $majorName . ' ' . $classRoom->turma];
                        });
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('major_id')
                    ->label('Area Estudu')
                    ->relationship('major', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nre')->label('ID Estudante')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Naran Estudante'),
                Tables\Columns\TextColumn::make('classRoom.level')->label('Klasse'),
                Tables\Columns\TextColumn::make('classRoom.turma')->label('Turma'),
                Tables\Columns\TextColumn::make('major.name')->label('Area Estudu'),
            ])
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
