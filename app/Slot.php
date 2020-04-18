<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'name', 'no', 'startTime', 'endTime', 'day_id', 'duration', 'isActive',
    ];
}
