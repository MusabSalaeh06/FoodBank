<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonateBasketResource extends JsonResource
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
            'id' => $this->donates->id,
            'date_update' => date($this->donates->updated_at),
            'reciever' => $this->donates->recievers->name." ".$this->donates->recievers->surname,
            'sender' => $this->donates->senders->name." ".$this->donates->senders->surname,
            'status' => $this->donates->status,
        ];
    }
}
