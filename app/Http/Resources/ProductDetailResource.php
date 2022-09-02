<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        date_default_timezone_set("Asia/Bangkok");
        if ($this->description == null) {
            return [
                'product_id' => $this->product_id,
                'created_at' => date($this->created_at),
                'giver' => $this->givers->name . " " . $this->givers->surname,
                'name' => $this->name,
                'type' => $this->types->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'amount' => (int) $this->amount . " " . $this->unit,
                'quantity' => (int) $this->quantity . " " . $this->unit,
                'product_image' => asset('/storage/product/product_image_assets/' . $this->product_image),
            ];
        } else {
            return [
                'product_id' => $this->product_id,
                'created_at' => date($this->created_at),
                'giver' => $this->givers->name . " " . $this->givers->surname,
                'name' => $this->name,
                'type' => $this->types->name,
                'description' => $this->description,
                'amount' => (int) $this->amount . " " . $this->unit,
                'quantity' => (int) $this->quantity . " " . $this->unit,
                'product_image' => asset('/storage/product/product_image_assets/' . $this->product_image),
            ];
        }
    }
}
