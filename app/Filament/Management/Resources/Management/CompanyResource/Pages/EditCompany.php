<?php

namespace App\Filament\Management\Resources\Management\CompanyResource\Pages;

use App\Filament\Management\Resources\Management\CompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
