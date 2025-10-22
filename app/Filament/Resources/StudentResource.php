<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Estudante';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /** Card: Informasi Pribadi */
                Forms\Components\Card::make([
                    Forms\Components\Section::make('Informasi Pessoal')
                        ->schema([
                            Forms\Components\TextInput::make('nre')
                                ->label('ID Estudante')
                                ->required()
                                ->unique(ignoreRecord: true),

                            Forms\Components\TextInput::make('name')
                                ->label('Naran Estudante')
                                ->required(),

                            Forms\Components\Select::make('sex')
                                ->label('Sexu')
                                ->options([
                                    'm' => 'Mane',
                                    'f' => 'Feto',
                                ])
                                ->required(),

                            Forms\Components\DatePicker::make('birth_date')
                                ->label('Data Moris')
                                ->required()
                                ->displayFormat('d-m-Y')  // format tampilan
                                ->native(false)            // pakai JS datepicker, bukan input HTML default
                                ->minDate('1990-01-01')   // batas tahun paling kecil
                                ->maxDate(now()) ,          // batas tahun paling besar (sekarang)

                            Forms\Components\TextInput::make('birth_place')
                                ->label('Fatin Moris')
                                ->required(),

                            Forms\Components\Textarea::make('address')
                                ->label('Enderesu'),

                            Forms\Components\TextInput::make('parent_name')
                                ->label('Naran Inan/Aman'),

                            Forms\Components\TextInput::make('parent_contact')
                                ->label('Nu. Kontaktu Inan/Aman'),

                            Forms\Components\FileUpload::make('photo')
                                ->label('Imagen')
                                ->image()
                                ->directory('students/photos'),
                        ])
                        ->columns(2), // dua kolom per baris
                ]),

                /** Card: Informasi Sekolah */
                Forms\Components\Card::make([
                    Forms\Components\Section::make('Informasaun Eskola')
                        ->schema([
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

                            Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'active' => 'Aktivu',
                                    'alumni' => 'Alumni',
                                    'left' => 'Sai',
                                ])
                                ->required(),

                            Forms\Components\TextInput::make('admission_year')
                                ->label('Tinan Entrada')
                                ->numeric(),

                            Forms\Components\TextInput::make('province')
                                ->label('Munisipiu'),

                            Forms\Components\TextInput::make('district')
                                ->label('Posto'),

                            Forms\Components\TextInput::make('subdistrict')
                                ->label('Suku'),
                        ])
                        ->columns(2), // dua kolom per baris
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nre')->label('ID Estudante')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Naran Estudante'),
                Tables\Columns\TextColumn::make('sex_text')->label('Sexu'),
                Tables\Columns\TextColumn::make('classRoom.level')->label('Klasse'),
                Tables\Columns\TextColumn::make('classRoom.turma')->label('Turma'),
                Tables\Columns\TextColumn::make('major.name')->label('Area Estudu'),
                Tables\Columns\TextColumn::make('admission_year')->label('Tinan Entrada'),
                Tables\Columns\TextColumn::make('status_text')->label('Status'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'active' => 'Aktivu',
                    'alumni' => 'Alumni',
                    'left' => 'Sai',
                ]),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
