<?php

namespace App\Filament\Resources\BmiLogResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\BmiLogResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\BmiLogResource\Api\Transformers\BmiLogTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = BmiLogResource::class;


    /**
     * Show BmiLog
     *
     * @param Request $request
     * @return BmiLogTransformer
     */
    public function handler(Request $request)
    {
        $id = $request->route('id');
        
        $query = static::getEloquentQuery();

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        return new BmiLogTransformer($query);
    }
}
