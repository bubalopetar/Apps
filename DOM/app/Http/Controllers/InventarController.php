<?php

namespace App\Http\Controllers;

use App\Inventar;
use App\Inventar_time;
use App\User;
use Illuminate\Http\Request;
use DB;

class InventarController extends Controller
{
    public function add(Request $request)
    {
        $novi=new Inventar;
        $novi->name=e($request->name);
        $novi->save();
       return redirect()->route('listInventar');
    }
    public function listInventar()
    {
        $list=Inventar::orderby('name')->get();
        return view('Inventar.list')->with('list',$list);
    }

    public function delete($id)
    {
        $inventar=Inventar::find($id);
        DB::table('inventar_times')->where('Inventar_id',$id)->delete();
        $inventar->delete();

        return redirect()->route('listInventar');
    }

    public function listInventarDate(Request $request,$id)
    {
        $list=Inventar::orderby('name')->get();
        $datum=$request->date;

        return view('Inventar.listDate')->with(['list'=>$list,'datum'=>$datum,'id'=>$id]);
    }



}
