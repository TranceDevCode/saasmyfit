<?php

namespace App\Filament\Company\Resources\IsapreResource\Pages;

use App\Filament\Company\Resources\IsapreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIsapres extends ListRecords
{
    protected static string $resource = IsapreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
