<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'nik' => $this->nik,
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'nomor_telepon' => $this->nomor_telepon,
            'fotoktp' => $this->fotoktp,
            'id_paket' => $this->id_paket,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
