<?php

namespace App\Filament\Company\Resources\MessageResource\Pages;

use App\Filament\Company\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMessage extends CreateRecord
{
    protected static string $resource = MessageResource::class;
}
