<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        if ($this->description == null) {
            return [
                'id' => $this->product_type_id,
                'name' => $this->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'image' => asset('/storage/product_type/product_type_image_assets/'.$this->image),
                'updated_at' => $this->updated_at,
            ];
        } else 
        {
            return [
                'id' => $this->product_type_id,
                'name' => $this->name,
                'description' => $this->description,
                'image' => asset('/storage/product_type/product_type_image_assets/'.$this->image),
                'updated_at' => $this->updated_at,
            ];
        }
    }
}
