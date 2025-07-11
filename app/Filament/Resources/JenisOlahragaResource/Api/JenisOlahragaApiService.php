<?php
namespace App\Filament\Resources\JenisOlahragaResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\JenisOlahragaResource;
use Illuminate\Routing\Router;


class JenisOlahragaApiService extends ApiService
{
    protected static string | null $resource = JenisOlahragaResource::class;

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
