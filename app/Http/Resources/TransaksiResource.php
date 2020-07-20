<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
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
            'id' => $this->id,
            'nama customer' => $this->nama_customer,
            'tanggal sewa' => $this->tanggal_sewa,
            'harga' => $this->harga,
            'detail' => DetailResource::collection($this->whenLoaded('detail')),
            //'detail' => DetailResource::collection($this->detail),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
