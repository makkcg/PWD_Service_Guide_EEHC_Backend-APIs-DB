<?php

namespace App\Http\Resources\Deaf\Branch;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BranchesResource extends JsonResource
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
            'city_name' => $this->city->name,
            'description' => $this->desc,
            'foundation_name' => $this->foundation->name,
            'name' => $this->name,
            'pwd_status' => $this->pwd_status,
            'images' => BranchImageResource::collection($this->images),
            'videos' => BranchVideoResource::collection($this->videos),
            'sounds' => BranchSoundResource::collection($this->sounds),
        ];
    }
}
