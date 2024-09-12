<?php

namespace App\Filament\Member\Resources\Member\DietResource\Pages;

use App\Filament\Member\Resources\Member\DietResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiets extends ListRecords
{
    protected static string $resource = DietResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
