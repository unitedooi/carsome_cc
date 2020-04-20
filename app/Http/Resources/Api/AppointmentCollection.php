<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\Resource;

class AppointmentCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'date' => $this->date,
            'slot' => $this->slot->startTime,
            'needReminder' => $this->needReminder,
            'remark' => $this->remark,
            'href' =>  [
                'link' => route('inspection.show', ['inspection'=>$this->id]), 
            ]

        ];
    }
}
