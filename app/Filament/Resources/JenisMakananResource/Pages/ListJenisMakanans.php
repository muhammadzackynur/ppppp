<?php

namespace App\Filament\Resources\JenisMakananResource\Pages;

use App\Filament\Resources\JenisMakananResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisMakanans extends ListRecords
{
    protected static string $resource = JenisMakananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
