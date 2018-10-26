<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class jadwalResource extends JsonResource
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
        'id_jadwal' => $this->id_jadwal,
        'tgl' => $this->tgl,
        'nidn' => $this->nidn,
        'niu' => $this->niu,
        'id_matkul' => $this->id_matkul,
        'ruang_kelas' => $this->ruang_kelas,
      ];
    }
}
