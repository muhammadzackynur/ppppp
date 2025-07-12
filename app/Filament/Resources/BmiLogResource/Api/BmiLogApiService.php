<?php
namespace App\Filament\Resources\BmiLogResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\BmiLogResource;
use Illuminate\Routing\Router;


class BmiLogApiService extends ApiService
{
    protected static string | null $resource = BmiLogResource::class;

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
