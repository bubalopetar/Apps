<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WardRoom extends Model
{
    public $timestamps = false;

    public function Ward(){
        return $this->belongsTo(Ward::class, 'id', 'Ward_id');
    }


    public function Room(){
        return $this->belongsTo(Room::class, 'id', 'Room_id');
    }
}
