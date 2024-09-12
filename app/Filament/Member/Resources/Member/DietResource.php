<?php

namespace App\Filament\Member\Resources\Member;

use App\Filament\Member\Resources\Member\DietResource\Pages;
use App\Filament\Member\Resources\Member\DietResource\RelationManagers;
use App\Models\Member\Diet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DietResource extends Resource
{
    protected static ?string $model = Diet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDiets::route('/'),
            'create' => Pages\CreateDiet::route('/create'),
            'edit' => Pages\EditDiet::route('/{record}/edit'),
        ];
    }
}
