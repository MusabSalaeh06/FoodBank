<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MissionReportResource extends JsonResource
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
            'mission_all' => $request->mission_all,
            'new_mission' => $request->new_mission,
            'mission_cancle' => $request->mission_cancle,
            'mission_submit' => $request->mission_submit,
            'mission_reject' => $request->mission_reject,
            'mission_complete' => $request->mission_complete,
            'mission_fail' => $request->mission_fail,
        ];
    }
}
