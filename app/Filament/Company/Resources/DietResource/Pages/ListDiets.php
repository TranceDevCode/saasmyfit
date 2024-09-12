<?php

namespace App\Filament\Company\Resources\DietResource\Pages;

use App\Filament\Company\Resources\DietResource;
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
