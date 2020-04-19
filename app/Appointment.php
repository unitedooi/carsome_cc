<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile', 'remark', 'date', 'slot_id', 'needReminder',
    ];

    public function day(){
        return $this->belongsTo('App\Day');
    }
}
