<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeDetailResource extends JsonResource
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
        if (empty($this->description)) {
            return 
                [
                    'product_type_id' => (int) $this->product_type_id,
                    'name' => $this->name,
                    'image' => asset('/storage/product_type/product_type_image_assets/' . $this->image),
                    'description' => "ไม่มีคำอธิบาย",
                    'date_update' => date($this->updated_at),
                ];
        } else {
            return
                [
                    'product_type_id' => (int) $this->product_type_id,
                    'name' => $this->name,
                    'image' => asset('/storage/product_type/product_type_image_assets/' . $this->image),
                    'description' => $this->description,
                    'date_update' => date($this->updated_at),
                ];
        }
    }
}
