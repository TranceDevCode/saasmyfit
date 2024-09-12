<?php

namespace App\Filament\Member\Resources\Member\PaymentResource\Pages;

use App\Filament\Member\Resources\Member\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayment extends EditRecord
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
