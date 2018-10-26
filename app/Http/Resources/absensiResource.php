<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class absensiResource extends JsonResource
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
        'id_absen' => $this->id_absen,
        'tangga' => $this->tangga,
      ];
    }
}
