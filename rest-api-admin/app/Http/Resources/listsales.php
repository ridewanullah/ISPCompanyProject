<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class listsales extends JsonResource
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
            'nip' => $this->nip,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'divisi' => $this->divisi,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
