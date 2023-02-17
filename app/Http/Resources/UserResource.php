<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return [
         'id' => $this->id,
         'name' => $this->name,
         'email' => $this->email,
         'rol_id' => $this->rol_id,
         'age' => $this->age,
         'phone' => $this->phone,
         'salery' => $this->salery,
         'password' => $this->password,
         'created_at' => $this->created_at,
         'updated_at' => $this->updated_at
       ];
    }
}
