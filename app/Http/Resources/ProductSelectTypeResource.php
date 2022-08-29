<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSelectTypeResource extends JsonResource
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
                'product_id' => $this->product_id,
                'name' => $this->name,
                'type' => $this->types->name,
                'quantity' => (int)$this->quantity." ".$this->unit,
                'product_image' => asset('/storage/product/product_image_assets/'.$this->product_image),
            ];
    }
}
