<?php

namespace App\Filament\Member\Resources\Member\MessageResource\Pages;

use App\Filament\Member\Resources\Member\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMessage extends CreateRecord
{
    protected static string $resource = MessageResource::class;
}
