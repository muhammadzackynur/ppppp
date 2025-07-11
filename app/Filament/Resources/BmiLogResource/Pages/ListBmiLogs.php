<?php

namespace App\Filament\Resources\BmiLogResource\Pages;

use App\Filament\Resources\BmiLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBmiLogs extends ListRecords
{
    protected static string $resource = BmiLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
