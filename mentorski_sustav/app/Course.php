<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    //
    public $timestamps = false;

    public function svi_koji_su_upisali_predmet() {
        return $this->hasMany(Course_user::class, 'student_id');
    }
    public function semestar($user){

        if($user['status']=='redoviti'){
          return $this['sem_redovni'];
        }
        elseif ($user['status']=='izvanredni')
            return $this['sem_izvanredni'];

    }

    public function status_za_studenta($student_id){
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        return DB::table('course_users')->where('student_id','=',$student_id)->where('predmet_id','=',$this->id)->get();
    }

}