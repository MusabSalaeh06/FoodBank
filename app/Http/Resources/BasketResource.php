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
        if ($this->product->description == null && $this->product->admin == null) {
            return [
                'product_id' => $this->product_id,
                'giver' => $this->product->givers->name." ".$this->product->givers->surname,
                'address_product' => "เขต :"." ".$this->product->givers->county." "."ถนน :"." ".$this->product->givers->road." ".
                                    "ตรอก/ซอย :"." ".$this->product->givers->alley." "."บ้านเลขที่ :"." ".$this->product->givers->house_number." ".
                                    "หมู่ :"." ".$this->product->givers->group_no." "."ตำบล :"." ".$this->product->givers->sub_district." ".
                                    "อำเภอ :".$this->product->givers->district." "."จังหวัด :"." ".$this->product->givers->province." ".
                                    "รหัสไปรษณีย์ :"." ".$this->product->givers->ZIP_code,
                'tel_address_product' => $this->product->givers->tel,
                'name' => $this->product->name,
                'type' => $this->product->types->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'amount' => (int)$this->product->amount." ".$this->product->unit,
                'quantity' => (int)$this->product->quantity." ".$this->product->unit,
                'product_image' => asset('/storage/product/product_image_assets/'.$this->product->product_image),
            ];
        } elseif ($this->product->description == null && $this->product->admin != null) { 
            return [
                'product_id' => $this->product_id,
                'giver' => $this->product->givers->name." ".$this->product->givers->surname,
                'address_product' => "สินค้าอยู่ที่ศูนย์",
                'tel_address_product' => $this->product->admins->tel,
                'name' => $this->product->name,
                'type' => $this->product->types->name,
                'description' => "ยังไม่มีคำอธิบาย",
                'amount' => (int)$this->product->amount." ".$this->product->unit,
                'quantity' => (int)$this->product->quantity." ".$this->product->unit,
                'status' => $this->status,
                'product_image' => asset('/storage/product/product_image_assets/'.$this->product->product_image),
            ];
        }elseif ($this->product->description != null && $this->product->admin == null) { 
            return [
                'product_id' => $this->product_id,
                'giver' => $this->product->givers->name." ".$this->product->givers->surname,
                'address_product' => "เขต :"." ".$this->product->givers->county." "."ถนน :"." ".$this->product->givers->road." ".
                                    "ตรอก/ซอย :"." ".$this->product->givers->alley." "."บ้านเลขที่ :"." ".$this->product->givers->house_number." ".
                                    "หมู่ :"." ".$this->product->givers->group_no." "."ตำบล :"." ".$this->product->givers->sub_district." ".
                                    "อำเภอ :".$this->product->givers->district." "."จังหวัด :"." ".$this->product->givers->province." ".
                                    "รหัสไปรษณีย์ :"." ".$this->product->givers->ZIP_code,
                                    'tel_address_product' => $this->product->givers->tel,
                'name' => $this->product->name,
                'type' => $this->product->types->name,
                'description' => $this->product->description,
                'amount' => (int)$this->product->amount." ".$this->product->unit,
                'quantity' => (int)$this->product->quantity." ".$this->product->unit,
                'status' => $this->status,
                'product_image' => asset('/storage/product/product_image_assets/'.$this->product->product_image),
            ];
        }elseif ($this->product->description != null && $this->product->admin != null) { 
            return [
                'product_id' => $this->product_id,
                'giver' => $this->product->givers->name." ".$this->product->givers->surname,
                'address_product' => "สินค้าอยู่ที่ศูนย์",
                'tel_address_product' => $this->product->admins->tel,
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
