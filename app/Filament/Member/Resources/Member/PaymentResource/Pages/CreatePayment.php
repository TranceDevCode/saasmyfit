<?php

namespace App\Filament\Member\Resources\Member\PaymentResource\Pages;

use App\Filament\Member\Resources\Member\PaymentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;
}
