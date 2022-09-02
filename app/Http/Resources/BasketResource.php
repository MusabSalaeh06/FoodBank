<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BasketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->product->description == null) {
            return [
                'product_id' => $this->product_id,
                'giver' => $this->product->givers->name." ".$this->product->givers->surname,
                'name' => $this->product->name,
                'type' => $this->product->types->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'amount' => (int)$this->product->amount." ".$this->product->unit,
                'quantity' => (int)$this->product->quantity." ".$this->product->unit,
                'product_image' => asset('/storage/product/product_image_assets/'.$this->product->product_image),
            ];
        } else {
            return [
                'product_id' => $this->product_id,
                'giver' => $this->product->givers->name." ".$this->product->givers->surname,
                'name' => $this->product->name,
                'type' => $this->product->types->name,
                'description' => $this->product->description,
                'amount' => (int)$this->product->amount." ".$this->product->unit,
                'quantity' => (int)$this->product->quantity." ".$this->product->unit,
                'status' => $this->status,
                'product_image' => asset('/storage/product/product_image_assets/'.$this->product->product_image),
            ];
        }
    }
}
