<?php
namespace App\Filament\Resources\JenisMakananResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\JenisMakananResource;
use App\Filament\Resources\JenisMakananResource\Api\Requests\UpdateJenisMakananRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = JenisMakananResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update JenisMakanan
     *
     * @param UpdateJenisMakananRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateJenisMakananRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}