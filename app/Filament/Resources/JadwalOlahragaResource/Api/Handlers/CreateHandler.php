<?php
namespace App\Filament\Resources\JadwalOlahragaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\JadwalOlahragaResource;
use App\Filament\Resources\JadwalOlahragaResource\Api\Requests\CreateJadwalOlahragaRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = JadwalOlahragaResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create JadwalOlahraga
     *
     * @param CreateJadwalOlahragaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateJadwalOlahragaRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}