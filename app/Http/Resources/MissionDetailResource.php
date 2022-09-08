<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MissionDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (empty($this->image)) {
            return 
                [
                    'id' => (int)$this->id,
                    'reciever' => $this->recievers->name . " " . $this->recievers->surname,
                    'address_reciever' => "เขต :" . " " . $this->recievers->county . " " . "ถนน :" . " " . $this->recievers->road . " " .
                    "ตรอก/ซอย :" . " " . $this->recievers->alley . " " . "บ้านเลขที่ :" . " " . $this->recievers->house_number . " " .
                    "หมู่ :" . " " . $this->recievers->group_no . " " . "ตำบล :" . " " . $this->recievers->sub_district . " " .
                    "อำเภอ :" . $this->recievers->district . " " . "จังหวัด :" . " " . $this->recievers->province . " " .
                    "รหัสไปรษณีย์ :" . " " . $this->recievers->ZIP_code,
                    'sender' => $this->senders->name . " " . $this->senders->surname,
                    'admin' => $this->admins->name . " " . $this->admins->surname,
                    'status' => $this->status,
                    'image' => "ไม่พบรูปภาพ",
                ];
        } else {
            return 
                [
                    'id' => (int)$this->id,
                    'reciever' => $this->recievers->name . " " . $this->recievers->surname,
                    'address_reciever' => "เขต :" . " " . $this->recievers->county . " " . "ถนน :" . " " . $this->recievers->road . " " .
                    "ตรอก/ซอย :" . " " . $this->recievers->alley . " " . "บ้านเลขที่ :" . " " . $this->recievers->house_number . " " .
                    "หมู่ :" . " " . $this->recievers->group_no . " " . "ตำบล :" . " " . $this->recievers->sub_district . " " .
                    "อำเภอ :" . $this->recievers->district . " " . "จังหวัด :" . " " . $this->recievers->province . " " .
                    "รหัสไปรษณีย์ :" . " " . $this->recievers->ZIP_code,
                    'sender' => $this->senders->name . " " . $this->senders->surname,
                    'admin' => $this->admins->name . " " . $this->admins->surname,
                    'status' => $this->status,
                    'image' => asset('/storage/donate/donate_image_assets/' . $this->image),
                ];
        }
    }
}
