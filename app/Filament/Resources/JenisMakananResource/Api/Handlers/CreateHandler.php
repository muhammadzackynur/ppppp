<?php
namespace App\Filament\Resources\JenisMakananResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\JenisMakananResource;
use App\Filament\Resources\JenisMakananResource\Api\Requests\CreateJenisMakananRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = JenisMakananResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create JenisMakanan
     *
     * @param CreateJenisMakananRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateJenisMakananRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}