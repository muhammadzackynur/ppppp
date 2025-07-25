<?php
namespace App\Filament\Resources\BmiLogResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BmiLog;

/**
 * @property BmiLog $resource
 */
class BmiLogTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
