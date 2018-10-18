<?php

namespace App\Http\Controllers;

use App\Course_user;
use App\User;
use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Stmt\Echo_;
use Session;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function courses(){

        $courses = Course::all();

        return view('course.courses', [
            'courses' => $courses
        ]);
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->isMethod(Request::METHOD_POST))
        {

            //validation
            $this->validate($request,array(
                'ime'=>'required|max:255',
                'kod'=>'required| max:16',
                'program'=>'string|nullable',
                'bodovi'=>'required|numeric',
                'sem_redovni'=>'required|numeric',
                'sem_izvanredni'=>'required|numeric'
            ));

            //store
            $novi_predmet=new Course();
            $novi_predmet->ime=e($request->ime);
            $novi_predmet->kod=e($request->kod);
            $novi_predmet->program=e($request->program);
            $novi_predmet->bodovi=e($request->bodovi);
            $novi_predmet->sem_redovni=e($request->sem_redovni);
            $novi_predmet->sem_izvanredni=e($request->sem_izvanredni);
            $novi_predmet->izborni=e($request->izborni);
            $novi_predmet->save();

            Session::flash('uspjeh','Predmet je uspješno spremljen!');

            //redirect
            return redirect()->route('DodajPredmet');
        }
            else
                return view('course.CreateCourse');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if ($request->isMethod(Request::METHOD_PUT))
        {
            //validacija ista kao i kod dodavanja
            $this->validate($request,array(
                'ime'=>'required|max:255',
                'kod'=>'required| max:16',
                'program'=>'string|nullable',
                'bodovi'=>'required|numeric',
                'sem_redovni'=>'required|numeric',
                'sem_izvanredni'=>'required|numeric'
            ));


                $predmet=Course::find($id);
                $predmet->ime=e($request->input('ime'));
                $predmet->kod=e($request->input('kod'));
                $predmet->program=e($request->input('program'));
                $predmet->bodovi=e($request->input('bodovi'));
                $predmet->sem_redovni=e($request->input('sem_redovni'));
                $predmet->sem_izvanredni=e($request->input('sem_izvanredni'));
                $predmet->izborni=e($request->input('izborni'));
                $predmet->save();

            Session::flash('uspjeh','Informacije su uspješno promjenjene!');

            //redirect
            return redirect()->route('svi_korisnici');


        }
        else{
            $course=Course::find($id);
            return view('course.edit')->with('course',$course);
        }

    }


    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($predmet_id)
    {
        DB::table('course_users')->where('predmet_id',$predmet_id)->delete();

        // brisanje predmeta
        $course=Course::find($predmet_id);
        $course->delete();
        SESSION::flash('obrisan','Predmet je uspješno obrisan!');
        return redirect()->route('svi_predmeti');
    }
}
