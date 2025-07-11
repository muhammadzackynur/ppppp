<?php

namespace App\Filament\Resources\JenisOlahragaResource\Pages;

use App\Filament\Resources\JenisOlahragaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisOlahragas extends ListRecords
{
    protected static string $resource = JenisOlahragaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
