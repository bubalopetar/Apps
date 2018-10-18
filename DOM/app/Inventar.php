<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inventar extends Model
{
    public $timestamps=false;

    public function ukupna_kolicina()
    {
        $sum=Inventar_time::where('inventar_id',$this->id)->count();
        return $sum;
    }

    public function naDan($datum)
    {
        //$dat=date('d',$datum);
        //return date('d', strtotime($datum));
        return Inventar_time::where('Inventar_id',$this->id)->whereDay('date','=',date('d', strtotime($datum)))->whereMonth('date','=',date('m', strtotime($datum)))->get()->count();
    }

    public function naMjesec($datum)
    {
        return Inventar_time::where('Inventar_id',$this->id)->whereMonth('date','=',date('m', strtotime($datum)))->get()->count();
    }
}
