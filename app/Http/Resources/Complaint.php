<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Complaint extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            //'id' => $this->id,
            'complaint' => $this->complaint,
            'city' => $this->city,
            'dependency' => $this->dependency,
            'person_name' => $this->person_name,
            'contact' => $this->contact,
            'state_id' => $this->state_id,
            'dependency_id' => $this->dependency_id
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'some_url' => url('http://letsdo.this')
        ];
    }
}
