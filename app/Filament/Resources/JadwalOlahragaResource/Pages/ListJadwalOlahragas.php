<?php

namespace App\Filament\Resources\JadwalOlahragaResource\Pages;

use App\Filament\Resources\JadwalOlahragaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalOlahragas extends ListRecords
{
    protected static string $resource = JadwalOlahragaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
