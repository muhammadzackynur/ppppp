<?php

namespace App\Filament\Resources\JenisOlahragaResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\JenisOlahragaResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\JenisOlahragaResource\Api\Transformers\JenisOlahragaTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = JenisOlahragaResource::class;


    /**
     * Show JenisOlahraga
     *
     * @param Request $request
     * @return JenisOlahragaTransformer
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

        return new JenisOlahragaTransformer($query);
    }
}
