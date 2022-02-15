<?php

namespace App\Http\Resources\Deaf\Regulation;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RegulationDescSoundsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sound' => url('/uploads/regulations/sounds/desc/'.$this->desc_sound),
        ];
    }
}
