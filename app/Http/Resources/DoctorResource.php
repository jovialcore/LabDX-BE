<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'gender' => $this->gender, 
            'profile_pic' => $this->profile_pic,
            'about' => $this->about,
            'edu' => $this->education_qualification,
            'specialization' => $this->specialization,
            'phone_number' => $this->phone_number,
            'org' => $this->hospital,
            'dateofbirth' => $this->dateofbirth,
            'address' => $this->address,
            'lga' => $this->lga,
            'state' => $this->state,
            'country' => $this->country,
        ];
    }
}
