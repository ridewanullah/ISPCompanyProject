<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class paket extends JsonResource
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
            'nama_paket' => $this->nama_paket,
            'kecepatan' => $this->kecepatan,
            'harga' => $this->harga
        ];
    }
}
