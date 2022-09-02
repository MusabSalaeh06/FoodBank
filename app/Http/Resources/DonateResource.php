<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonateResource extends JsonResource
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
            return [
                'id' => $this->id,
                'date_update' => date($this->updated_at),
                'reciever' => $this->recievers->name." ".$this->recievers->surname,
                'address_reciever' => "เขต :"." ".$this->recievers->county." "."ถนน :"." ".$this->recievers->road." ".
                                    "ตรอก/ซอย :"." ".$this->recievers->alley." "."บ้านเลขที่ :"." ".$this->recievers->house_number." ".
                                    "หมู่ :"." ".$this->recievers->group_no." "."ตำบล :"." ".$this->recievers->sub_district." ".
                                    "อำเภอ :".$this->recievers->district." "."จังหวัด :"." ".$this->recievers->province." ".
                                    "รหัสไปรษณีย์ :"." ".$this->recievers->ZIP_code,
                'status' => $this->status,
            ];
    }
}
