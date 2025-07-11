<?php
namespace App\Filament\Resources\JenisMakananResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\JenisMakanan;

/**
 * @property JenisMakanan $resource
 */
class JenisMakananTransformer extends JsonResource
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
