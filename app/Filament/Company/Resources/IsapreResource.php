<?php

namespace App\Filament\Company\Resources;

use App\Filament\Company\Resources\IsapreResource\Pages;
use App\Filament\Company\Resources\IsapreResource\RelationManagers;
use App\Models\Isapre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IsapreResource extends Resource
{
    protected static ?string $model = Isapre::class;

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
            'index' => Pages\ListIsapres::route('/'),
            'create' => Pages\CreateIsapre::route('/create'),
            'edit' => Pages\EditIsapre::route('/{record}/edit'),
        ];
    }
}
