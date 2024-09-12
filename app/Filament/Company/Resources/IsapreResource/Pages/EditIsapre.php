<?php

namespace App\Filament\Company\Resources\IsapreResource\Pages;

use App\Filament\Company\Resources\IsapreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIsapre extends EditRecord
{
    protected static string $resource = IsapreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
