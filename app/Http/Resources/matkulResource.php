<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class matkulResource extends JsonResource
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
        'id_matkul' => $this->id_matkul,
        'nama_matkul' => $this->nama_matkul,
      ];
    }
}
