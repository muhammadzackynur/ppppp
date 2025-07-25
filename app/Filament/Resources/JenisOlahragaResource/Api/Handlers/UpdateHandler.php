<?php
namespace App\Filament\Resources\JenisOlahragaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\JenisOlahragaResource;
use App\Filament\Resources\JenisOlahragaResource\Api\Requests\UpdateJenisOlahragaRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = JenisOlahragaResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update JenisOlahraga
     *
     * @param UpdateJenisOlahragaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateJenisOlahragaRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}