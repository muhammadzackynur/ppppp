<?php
namespace App\Filament\Resources\JadwalOlahragaResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\JadwalOlahragaResource;
use Illuminate\Routing\Router;


class JadwalOlahragaApiService extends ApiService
{
    protected static string | null $resource = JadwalOlahragaResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
