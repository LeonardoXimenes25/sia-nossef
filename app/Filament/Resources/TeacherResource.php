<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Teacher;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TeacherResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TeacherResource\RelationManagers;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationLabel = 'Professor';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('teacher_id')
                    ->label('Id Professor')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('name')
                    ->label('Naran Professor')
                    ->required(),

                Select::make('gender')
                    ->label('Sexu')
                    ->options([
                        'm' => 'Male',
                        'f' => 'Female',
                    ])
                    ->required(),

                DatePicker::make('birth_date')
                    ->label('Data Moris')
                    ->required(false),

                TextInput::make('birth_place')
                    ->label('Fatin Moris')
                    ->maxLength(50)
                    ->required(false),

                TextInput::make('educational_qualification')
                    ->label('Abilitasaun Literaria')
                    ->maxLength(100)
                    ->required(false),

                Select::make('employment_status')
                    ->label('Estatuta')
                    ->options([
                        'fp' => 'Permanent',
                        'ft' => 'Full-Time',
                        'pt' => 'Part-Time',
                    ])
                    ->required(),

                DatePicker::make('employment_start_date')
                    ->label('Data Servisu')
                    ->required(false),

                TextInput::make('phone')
                    ->label('Nu. Telemovel')
                    ->maxLength(20)
                    ->required(false),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(false),

                FileUpload::make('photo')
                ->label('Imajen')
                ->image()
                ->directory('teachers')
                ->maxSize(1024)
                ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('teacher_id')->label('ID Professor')->sortable(),
                TextColumn::make('name')->label('Naran Professor')->sortable(),
                TextColumn::make('gender')->label('Sexu'),
                TextColumn::make('birth_place')->label('Fatin Moris'),
                TextColumn::make('birth_date')->label('Data Moris')->date(),
                TextColumn::make('educational_qualification')->label('Abilitasaun Literaria'),
                BadgeColumn::make('Estatuta')
    ->label('Status')
    ->sortable()
    ->getStateUsing(function ($record) {
        return match ($record->employment_status) {
            'fp' => 'Permanent',
            'ft' => 'Full-Time',
            'pt' => 'Part-Time',
            default => '-',
        };
    })
    ->colors([
        'success' => 'fp',   // hijau
        'primary' => 'ft',   // biru
        'warning' => 'pt',   // kuning
    ]),
                TextColumn::make('employment_start_date')->label('Start Date')->date(),
                TextColumn::make('phone')->label('Phone'),
                TextColumn::make('email')->label('Email'),
            ])
            ->filters([
                SelectFilter::make('employment_status')
                ->label('Status')
                ->options([
                    'fp' => 'Permanent',
                    'ft' => 'Full-Time',
                    'pt' => 'Part-Time',
                ]),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
