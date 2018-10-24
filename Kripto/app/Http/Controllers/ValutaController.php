<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valuta;
use App\Http\Requests;
use App\Http\Resources\valuta as ValutaResource;


class ValutaController extends Controller
{
    public function get_all()
    {
        $valute=Valuta::all();
      //  return ValutaResource::collection($valute);
        return $valute->toJson();
    }

    public function get_valute_id($valuta_id){
        $valuta=Valuta::find($valuta_id);
        return $valuta->toJson();
        
    }

    public function add_valute(Request $request){
        $nova=new Valuta;
        $nova->name=$request->input('name');
        $nova->adress=$request->input('adress');
        $nova->block_chain=$request->input('block_chain');
        $nova->save();
        return $nova->toJson();
    }

    public function update_valute(Request $request ){

        $valuta=Valuta::find($request->id);
        $valuta->name=$request->input('name');
        $valuta->adress=$request->input('adress');
        $valuta->block_chain=$request->input('block_chain');
        return $valuta;
    }

    public function delete(Request $request){
        $valuta=Valuta::findorfail($request->input('id'));
        $valuta->delete();
        return $valuta->toJson();
    }

}
