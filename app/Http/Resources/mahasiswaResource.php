<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class mahasiswaResource extends JsonResource
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
        'niu' => $this->niu,
        'nama' => $this->nama,
        'prodi' => $this->prodi,
        'angkatan' => $this->angkatan,
        'imei' => $this->imei,
        'created_at => (string) $this->created_at',
        'updated_at => (string) $this->updated_at',
      ];
    }
}
