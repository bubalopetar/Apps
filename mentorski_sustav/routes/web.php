<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//da neregistrirani korisnik ne moze pristupiti stranicama, a student da moze pristupiti samo upisnom listu
Route::group(['middleware' => 'auth'], function () {

// Dodaj predmet
Route::match(['get','post'],'/DodajPredmet', 'CourseController@create')->name('DodajPredmet')->middleware('student');

// brisi predmet
Route::delete('/remove/{id}', 'CourseController@destroy')->name('obrisi_predmet');


// Prikaz svih korisnika
Route::match(['get','post'],'/home', 'UserController@users')->name('svi_korisnici')->middleware('student');

//Prikaz svih predmeta
Route::match(['get','post'],'/courses', 'CourseController@courses')->name('svi_predmeti')->middleware('student');


//Editiranje predmeta
Route::match(['get','put'],'/edit/{id}', 'CourseController@edit')->name('edit')->middleware('student');


// dodaj upisni
Route::get('/add_course_user/{student_id}{predmet_id}', 'Course_userController@create')->name('dodaj_upisni');

//brisi upisni
Route::get('/remove_course_user/{student_id}/{predmet_id}', 'Course_userController@destroy')->name('brisi_upisni_list');

// promjeni status predmeta
Route::put('/status/{student_id}/{predmet_id}', 'Course_userController@change_status')->name('promjeni_status_predmeta');

// logout
    Route::get('/logout','UserController@logout')->name('logout');

// upisni list
    Route::match(['get','post'],'/course_user/{id}', 'Course_userController@show')->name('upisni_list')->middleware('upisni');


    });


// ispod je sve bez middlewarea jer na to moze svatko doci

// naslovna login
Route::get('/', function () {
    return view('auth.login');
})->name('pocetna')->middleware('login_register');

//registracija
Route::get('/register', function () {
    return view('auth.register');
})->name('registracija')->middleware('login_register');

//logout

Auth::routes();




