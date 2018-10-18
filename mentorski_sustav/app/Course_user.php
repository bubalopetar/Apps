<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_user extends Model
{
    //

    public $timestamps = false;

    public function predmet()
    {
        return $this->belongsTo(Course::class, 'predmet_id', 'id');
    }
    public function korisnik()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
