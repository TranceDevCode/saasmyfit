<?php

namespace App\Filament\Company\Resources\AfpResource\Pages;

use App\Filament\Company\Resources\AfpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAfp extends EditRecord
{
    protected static string $resource = AfpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
