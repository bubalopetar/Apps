<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Room extends Model
{
    public $timestamps = false;

    public function Wards()
    {
        $Wards=[];
         $WardRooms=DB::table('ward_rooms')->where('Room_id','=',$this->id)->get();
        foreach ($WardRooms as $WR)
        {
            array_push($Wards,Ward::find($WR->Ward_id));
        }
        return $Wards;
    }
}
