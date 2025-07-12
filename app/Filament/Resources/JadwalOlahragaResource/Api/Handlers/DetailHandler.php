<?php

namespace App\Filament\Resources\JadwalOlahragaResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\JadwalOlahragaResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use App\Filament\Resources\JadwalOlahragaResource\Api\Transformers\JadwalOlahragaTransformer;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = JadwalOlahragaResource::class;


    /**
     * Show JadwalOlahraga
     *
     * @param Request $request
     * @return JadwalOlahragaTransformer
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

        return new JadwalOlahragaTransformer($query);
    }
}
