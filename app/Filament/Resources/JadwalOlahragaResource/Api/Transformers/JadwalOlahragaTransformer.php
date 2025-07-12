<?php
namespace App\Filament\Resources\JadwalOlahragaResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\JadwalOlahraga;

/**
 * @property JadwalOlahraga $resource
 */
class JadwalOlahragaTransformer extends JsonResource
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
