<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Room;
use App\Ward;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;

class RoomController extends Controller
{
    public function addRoom(Request $request){

        if ($request->isMethod(Request::METHOD_POST)) {
            $this->validate($request, array(
                'br_sobe' => 'unique:Rooms'
            ));

            $Room=new Room();
            $Room->br_sobe=$request->br_sobe;
            $Room->br_kreveta=$request->br_kreveta;
            $Room->opis=e($request->opis);
            $Room->save();
            SESSION::flash('uspjeh soba', 'Soba uspješno dodana!');

            return view('Room.add');
        }
        else
            return view('Room.add');

    }
    public function allRooms()
    {
        $Rooms=Room::orderBy('br_sobe')->get();
        return view('Room.list')->with('Rooms',$Rooms);
    }

    public function delete($Room_id)
    {
        DB::table('ward_rooms')->where('Room_id',$Room_id)->delete();
        $Room=Room::find($Room_id);
        $Room->delete();
        return redirect()->route('listRooms');
    }
    public function edit(Request $request,$id)
    {
        if ($request->isMethod(Request::METHOD_PUT)) {


            $Room=Room::find($id);
            $Room->br_sobe=$request->br_sobe;
            $Room->br_kreveta=$request->br_kreveta;
            $Room->opis=e($request->opis);
            $Room->save();
            SESSION::flash('uspjeh soba uređena', 'Podatci uspješno promjenjeni!');

            return view('Room.edit')->with('Room',$Room);
        }
        else
        {
            $Room=Room::find($id);
            return view('Room.edit')->with('Room',$Room);
        }

    }
}
