<?php

namespace App\Http\Controllers;

use App\Course;
use App\Course_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Course_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id,$predmet_id)
    {
        $course_user=new Course_user();
        $course_user->student_id=$student_id;
        $course_user->predmet_id=$predmet_id;
        $course_user->status='upisan';
        $course_user->save();

        return redirect()->route('upisni_list',$student_id);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $a=$user->makeVisible('attributes')->toArray();



        //svi upisni listovi nekog korisnika
        $course_users=$user->upisani_predmeti;


        //svi upisani predmeti nekog korisnika
        $upisani_predmeti=[];
         foreach ($course_users as $cu)
         array_push($upisani_predmeti,$cu->predmet);

         //svi predmeti
        $all_courses=Course::all();
        $svi_predmeti=[];
        foreach ($all_courses as $ac)
            array_push($svi_predmeti,$ac);

        //predmeti koji nisu upisani
        $nisu_upisani=array_diff($svi_predmeti,$upisani_predmeti);


         return view('course_user.course_user',['user'=>$user,'nisu_upisani'=>$nisu_upisani,'upisani_predmeti'=>$upisani_predmeti]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id,$predmet_id)
    {
        DB::table('course_users')->where('predmet_id',$predmet_id)->where('student_id',$student_id)->delete();
        return redirect()->route('upisni_list',['student_id'=>$student_id,'predmet_id'=>$predmet_id]);

    }

    public function change_status($predmet_id,$student_id)
    {
        DB::table('course_users')
            ->where('student_id', $student_id)
            ->where('predmet_id',$predmet_id)
            ->update(['status' => 'polozen']);

        return redirect()->route('upisni_list',$student_id);
    }
}


