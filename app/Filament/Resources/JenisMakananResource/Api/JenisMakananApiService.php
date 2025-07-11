<?php
namespace App\Filament\Resources\JenisMakananResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\JenisMakananResource;
use Illuminate\Routing\Router;


class JenisMakananApiService extends ApiService
{
    protected static string | null $resource = JenisMakananResource::class;

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
