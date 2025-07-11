<?php

namespace App\Filament\Resources\JenisMakananResource\Pages;

use App\Filament\Resources\JenisMakananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisMakanan extends EditRecord
{
    protected static string $resource = JenisMakananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
