<?php

namespace App\Http\Controllers;

use App\Inventar_time;
use Illuminate\Http\Request;
use DateTimeInterface;

class Inventar_timeController extends Controller
{
    public function add($id)
    {
    $new=new Inventar_time();
    $new->Inventar_id=$id;
    $new->date = date('Y-m-d H:i:s');
    $new->save();

    return redirect()->route('listInventar');
    }



}
