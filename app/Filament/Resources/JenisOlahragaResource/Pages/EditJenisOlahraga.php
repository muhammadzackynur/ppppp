<?php

namespace App\Filament\Resources\JenisOlahragaResource\Pages;

use App\Filament\Resources\JenisOlahragaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisOlahraga extends EditRecord
{
    protected static string $resource = JenisOlahragaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
