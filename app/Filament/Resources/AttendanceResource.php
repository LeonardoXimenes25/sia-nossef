<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Attendance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttendanceResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('student_id')
                    ->label('Student')
                    ->relationship('student', 'name')
                    ->required(),
                
                Forms\Components\Select::make('class_room_id')
                    ->label('Class Room')
                    ->relationship('subjectAssignment.classroom', 'level')
                    ->required(),
                
                Forms\Components\Select::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('subjectAssignment.teacher', 'name')
                    ->required(),

                Forms\Components\Select::make('subject_assignment_id')
                    ->label('Subject Assignment')
                    ->relationship('subjectAssignment.subject', 'name')
                    ->required(),

                Forms\Components\Select::make('academic_year_id')
                    ->label('Academic Year')
                    ->relationship('subjectAssignment.academicyear', 'name')
                    ->required(),

                Forms\Components\Select::make('period_id')
                    ->label('Period')
                    ->relationship('period', 'name')
                    ->required(),

                Forms\Components\DatePicker::make('date')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'presente', 
                        'moras', 
                        'lisensa', 
                        'falta'
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student.name')->label('Student'),
                Tables\Columns\TextColumn::make('subjectAssignment.classroom', 'level')->label('Class Room'),
                Tables\Columns\TextColumn::make('subjectAssignment.teacher', 'name')->label('Teacher'),
                Tables\Columns\TextColumn::make('subjectAssignment.subject', 'name')->label('Subject'),
                Tables\Columns\TextColumn::make('subjectAssignment.academicyear', 'name')->label('Academic Year'),
                Tables\Columns\TextColumn::make('period.name')->label('Period'),
                Tables\Columns\TextColumn::make('date')->date()->label('Date'),
                Tables\Columns\BadgeColumn::make('status')
    ->getStateUsing(function ($record) {
        return match($record->status) {
            'presente' => 'Presente',
            'moras' => 'Moras',
            'lisensa' => 'Lisensa',
            'falta' => 'Falta',
            default => $record->status,
        };
    })
    ->colors([
        'success' => 'presente',
        'primary' => 'moras',
        'warning' => 'lisensa',
        'danger' => 'falta',
    ])
    ->sortable()
    ->searchable()

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'presente', 
                        'moras', 
                        'lisensa', 
                        'falta'
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
