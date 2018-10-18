<?php

namespace App\Http\Controllers;

use App\WardRoom;
use Illuminate\Http\Request;
use DB;

class WardRoomController extends Controller
{
    public function create($ward_id,$room_id)
    {

        $new=new WardRoom();
        $new->Ward_id=$ward_id;
        $new->Room_id=$room_id;
        $new->save();
    }
    public function delete($Ward_id,$Room_id){
        //$old=DB::table('ward_rooms')->where('Ward_id',$Ward_id)->where('Room_id',$Room_id)->get();
        $old=WardRoom::where('Ward_id',$Ward_id)->where('Room_id',$Room_id); /* Pretraga vrijednosti u tablici sa uvjetom*/
        $old->delete();
    }
}
