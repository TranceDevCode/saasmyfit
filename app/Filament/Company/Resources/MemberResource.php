<?php

namespace App\Filament\Company\Resources;

use App\Filament\Company\Resources\MemberResource\Pages;
use App\Filament\Company\Resources\MemberResource\RelationManagers;
use App\Models\Company\Member;
use App\Models\Management\Commune;
use App\Models\Management\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Support\RawJs;


class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $tenantOwnershipRelationshipName = 'companies';

    protected static ?int $navigationSort = 1;

    public static function getPluralLabel(): ?string
    {
        return "Alumnos";
    }

    public static function getLabel(): ?string
    {
        return "Alumno";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Creacion de cuenta')
                        ->schema([
                            Forms\Components\Grid::make(2)
                                ->schema([
                                    Forms\Components\TextInput::make('name')
                                        ->maxLength(255)
                                        ->required()
                                        ->label('Nombre y Apellidos'),
                                    Forms\Components\TextInput::make('email')
                                        ->required()
                                        ->email()
                                        ->unique(Member::class, 'email', ignoreRecord: true)
                                        ->columnSpan(1),
                                    Forms\Components\TextInput::make('password')
                                        ->required()
                                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                                        ->dehydrated(fn ($state) => filled($state))
                                        ->required(fn (string $context): bool => $context === 'create')
                                        ->confirmed()
                                        ->password()
                                        ->minLength(8)
                                        ->maxLength(200)
                                        ->label('Contraseña'),
                                    Forms\Components\TextInput::make('password_confirmation')
                                        ->password()
                                        ->label('Confirmar contraseña'),
                                    Forms\Components\Checkbox::make('active')
                                        ->label('Activo')
                                        ->required(),
                                ])
                        ]),
                    Forms\Components\Wizard\Step::make('Datos del cliente')
                        ->schema([
                            Forms\Components\Grid::make(3)
                                ->schema([
                                    Forms\Components\Select::make('sex')
                                        ->label('Sexo')
                                        ->options([
                                            'masculino' => 'Masculino',
                                            'femenino' => 'Femenino'
                                        ]),
                                    Forms\Components\DatePicker::make('birthday')
                                        ->label('Fecha de nacimiento'),
                                    Forms\Components\TextInput::make('rut')
                                        ->label('Rut'),
                                    Forms\Components\TextInput::make('address')
                                        ->label('Direccion'),
                                    Forms\Components\TextInput::make('telephone')
                                        ->label('Telefono'),
                                    Forms\Components\TextInput::make('profesion')
                                        ->label('Profesión')
                                        ->placeholder('Ingrese una profesion'),
                                    Forms\Components\Select::make('country_id')
                                        ->live()
                                        ->relationship('country', 'name')
                                        ->label('Seleccione un pais'),
                                    Forms\Components\Select::make('region_id')
                                        ->options(fn (Get $get): Collection => Region::query()
                                            ->where('country_id', $get('country_id'))
                                            ->pluck('name', 'id'))
                                        ->live()
                                        //->relationship('region', 'name')
                                        ->label('Seleccione una region'),
                                    Forms\Components\Select::make('commune_id')
                                        ->options(fn (Get $get): Collection => Commune::query()
                                            ->where('region_id', $get('region_id'))
                                            ->pluck('name', 'id'))
                                        ->label('Seleccione una comuna'),
                                ])
                        ]),
                    Forms\Components\Wizard\Step::make('Datos Clinicos')
                        ->schema([
                            Forms\Components\Grid::make(3)
                                ->schema([
                                    Forms\Components\Select::make('experience')
                                        ->label('Experiencia fisica')
                                        ->options([
                                            'basico' => 'Básico',
                                            'medio' => 'Medio',
                                            'avanzado' => 'Avanzado',
                                        ]),
                                    Forms\Components\Select::make('activitylevel')
                                        ->label('Nivel de actividad')
                                        ->options([
                                            'sedentario' => 'Sedentario',
                                            'baja' => 'Baja',
                                            'activo' => 'Activo',
                                            'muy-activo' => 'Muy Activo',
                                        ]),
                                    Forms\Components\TextInput::make('size')
                                        ->placeholder('Ejemplo 1.70')
                                        ->live()
                                        ->numeric()
                                        ->mask(RawJs::make(<<<'JS'
                                                /^(\d{1,4})(\d{0,2})?$/.test($input) ? $input.replace(/^(\d{1})(\d{0,2})?$/, '$1.$2') : ''
                                            JS))
                                        ->label('Altura'),
                                    Forms\Components\TextInput::make('weight')
                                        ->label('Peso Kg.')
                                        ->numeric()
                                        ->live(debounce: 500)
                                        ->afterStateUpdated(function (Set $set, Get $get) {
                                            $size = $get('size');
                                            $weight = $get('weight');

                                            // Verificar si ambos campos tienen valores
                                            if ($size !== '' && $weight !== '') {
                                                $imc = $weight / ($size * $size);
                                                $set('imc', $imc);
                                            }
                                        }),
                                    Forms\Components\TextInput::make('imc')
                                        ->label('Indice de masa corporal')
                                        ->readonly()
                                        ->live(),
                                    Forms\Components\TextInput::make('avaragefat')
                                        ->numeric()
                                        ->label('% de grasa'),
                                    Forms\Components\TextInput::make('target')
                                        ->label('Objetivos')
                                        ->placeholder('Ingrese bajar de peso u otros.'),
                                ])
                        ])
                ])
                    ->columnSpanFull()
                    ->persistStepInQueryString('alumn-wizard-step'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Nombre'))
                    ->sortable()
                    ->searchable(/* isIndividual: true */),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('Correo'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Activo')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rut')
                    ->label('Rut')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label(__('Verificado')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Creado'))
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('active')
                    ->label('Estado')
                    ->options([
                        '1' => 'Activos',
                        '0' => 'Desactivados',
                    ]),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Creado desde'),
                        Forms\Components\DatePicker::make('created_until')->label('Creado hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
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
            RelationManagers\PlansRelationManager::class,
            RelationManagers\DietsRelationManager::class,
            RelationManagers\RoutinesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
