<?php

namespace App\Http\Resources\Desktop\Procedure;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProcedureResource extends JsonResource
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
            'title' => 'خطوة رقم '.$this->order,
            'desc' => $this->desc,
            'sound' =>ProcedureDescSoundsResource::collection($this->translation->media),
            'vids' => ProcedureDescVideosResource::collection($this->translation->media),
            'imgs' => ProcedureImageResource::collection($this->images),
        ];
    }
}
