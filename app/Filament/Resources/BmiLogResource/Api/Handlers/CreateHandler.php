<?php
namespace App\Filament\Resources\BmiLogResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\BmiLogResource;
use App\Filament\Resources\BmiLogResource\Api\Requests\CreateBmiLogRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = BmiLogResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create BmiLog
     *
     * @param CreateBmiLogRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateBmiLogRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}