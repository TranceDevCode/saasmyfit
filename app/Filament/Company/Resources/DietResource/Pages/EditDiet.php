<?php

namespace App\Filament\Company\Resources\DietResource\Pages;

use App\Filament\Company\Resources\DietResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiet extends EditRecord
{
    protected static string $resource = DietResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}