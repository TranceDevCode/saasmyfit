<?php

namespace App\Filament\Management\Resources\Management\RoleResource\Pages;

use App\Filament\Management\Resources\Management\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
    protected static string $resource = RoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
