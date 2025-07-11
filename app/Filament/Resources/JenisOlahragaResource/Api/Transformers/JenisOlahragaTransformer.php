<?php
namespace App\Filament\Resources\JenisOlahragaResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\JenisOlahraga;

/**
 * @property JenisOlahraga $resource
 */
class JenisOlahragaTransformer extends JsonResource
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
