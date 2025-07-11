<?php

namespace App\Filament\Resources\JenisMakananResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\JenisMakananResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\JenisMakananResource\Api\Transformers\JenisMakananTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = JenisMakananResource::class;


    /**
     * Show JenisMakanan
     *
     * @param Request $request
     * @return JenisMakananTransformer
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

        return new JenisMakananTransformer($query);
    }
}
