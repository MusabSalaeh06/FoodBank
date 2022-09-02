<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'member_id' => $this->member_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'address' => "เขต :"." ".$this->county." "."ถนน :"." ".$this->road." ".
                                "ตรอก/ซอย :"." ".$this->alley." "."บ้านเลขที่ :"." ".$this->house_number." ".
                                "หมู่ :"." ".$this->group_no." "."ตำบล :"." ".$this->sub_district." ".
                                "อำเภอ :".$this->district." "."จังหวัด :"." ".$this->province." ".
                                "รหัสไปรษณีย์ :"." ".$this->ZIP_code,
            'password' => $this->pass,
            'product_image' => asset('/storage/member/profile_image_assets/'.$this->profile),
        ];
    }
}
