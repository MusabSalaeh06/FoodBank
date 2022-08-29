<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
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
                'id' => $this->product_type_id,
                'date_update' =>  date($this->updated_at),
                'name' => $this->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'image' => asset('/storage/product_type/product_type_image_assets/'.$this->image),
            ];
        } else 
        {
            return [
                'id' => $this->product_type_id,
                'date_update' =>  date($this->updated_at),
                'name' => $this->name,
                'description' => $this->description,
                'image' => asset('/storage/product_type/product_type_image_assets/'.$this->image),
            ];
        }
    }
}
