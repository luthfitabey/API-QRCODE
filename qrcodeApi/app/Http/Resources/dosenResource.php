<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class dosenResource extends JsonResource
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
        'nidn' => $this->nidn,
        'nama' => $this->nama,
      ];
    }
}
