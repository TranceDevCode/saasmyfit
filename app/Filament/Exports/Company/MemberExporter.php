<?php

namespace App\Filament\Exports\Company;

use App\Models\Company\Member;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class MemberExporter extends Exporter
{
    protected static ?string $model = Member::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('name'),
            ExportColumn::make('email'),
            ExportColumn::make('active'),
            ExportColumn::make('rut'),
            ExportColumn::make('address'),
            ExportColumn::make('telephone'),
            ExportColumn::make('email_verified_at'),
            ExportColumn::make('region.name'),
            ExportColumn::make('commune.name'),
            ExportColumn::make('country.name'),
            ExportColumn::make('avaragefat'),
            ExportColumn::make('sex'),
            ExportColumn::make('experience'),
            ExportColumn::make('size'),
            ExportColumn::make('activitylevel'),
            ExportColumn::make('weight'),
            ExportColumn::make('birthday'),
            ExportColumn::make('target'),
            ExportColumn::make('imc'),
            ExportColumn::make('profesion'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your member export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
