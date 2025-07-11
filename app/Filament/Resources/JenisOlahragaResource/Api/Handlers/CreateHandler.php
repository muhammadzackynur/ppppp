<?php
namespace App\Filament\Resources\JenisOlahragaResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\JenisOlahragaResource;
use App\Filament\Resources\JenisOlahragaResource\Api\Requests\CreateJenisOlahragaRequest;

class CreateHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = JenisOlahragaResource::class;

    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    /**
     * Create JenisOlahraga
     *
     * @param CreateJenisOlahragaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(CreateJenisOlahragaRequest $request)
    {
        $model = new (static::getModel());

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Create Resource");
    }
}