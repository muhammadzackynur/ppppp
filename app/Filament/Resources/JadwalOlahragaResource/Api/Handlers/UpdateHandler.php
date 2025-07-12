<?php
namespace App\Filament\Resources\JadwalOlahragaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\JadwalOlahragaResource;
use App\Filament\Resources\JadwalOlahragaResource\Api\Requests\UpdateJadwalOlahragaRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = JadwalOlahragaResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update JadwalOlahraga
     *
     * @param UpdateJadwalOlahragaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateJadwalOlahragaRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}