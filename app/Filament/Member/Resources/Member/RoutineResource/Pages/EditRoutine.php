<?php

namespace App\Filament\Member\Resources\Member\RoutineResource\Pages;

use App\Filament\Member\Resources\Member\RoutineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoutine extends EditRecord
{
    protected static string $resource = RoutineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
