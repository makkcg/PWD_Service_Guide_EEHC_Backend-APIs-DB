<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserProfileResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'branch' => $this->branch,
            'image' => url($this->image != null ?  '/employee/' . $this->image : '/Users/avatar.png'),
            'qrCode' => url($this->qr_code != null ? '/qrcodes/' . $this->qr_code : '/Users/avatar.png'),
            'access_token' => $this->access_token,

        ];
    }
}
