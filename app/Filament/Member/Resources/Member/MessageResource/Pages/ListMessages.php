<?php

namespace App\Filament\Member\Resources\Member\MessageResource\Pages;

use App\Filament\Member\Resources\Member\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMessages extends ListRecords
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
