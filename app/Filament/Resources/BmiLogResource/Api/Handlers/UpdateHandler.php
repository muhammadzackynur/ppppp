<?php
namespace App\Filament\Resources\BmiLogResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\BmiLogResource;
use App\Filament\Resources\BmiLogResource\Api\Requests\UpdateBmiLogRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = BmiLogResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update BmiLog
     *
     * @param UpdateBmiLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateBmiLogRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}