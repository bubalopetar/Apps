<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'WardController@allWards')->name('home');
//korisnici
Route::match(['get','post'],'/Ward/add', 'WardController@add')->name('addWard')->middleware('CheckUser');

Route::get('/Ward/{id}','WardController@show')->name('showWard');

Route::Delete('/Ward/delete/{id}','WardController@delete')->name('deleteWard')->middleware('CheckUser');

Route::get('/Wards','WardController@allWards')->name('listWards');

Route::match(['get','put'],'/Ward/edit/{id}','WardController@editWard')->name('editWard')->middleware('CheckUser');

Route::post('/Ward/profile_picture/{id}','WardController@addProfile_picture')->name('addProfile_picture')->middleware('CheckUser');

Route::post('/Wards/addpictures/{id}','WardController@addPictures')->name('addPictures')->middleware('CheckUser');

Route::get('/Wards/deletePicture/{id}/{slika}','WardController@deletePicture')->name('deletePicture')->middleware('CheckUser');

//sobe
Route::match(['get','post'],'/Room/add','RoomController@addRoom')->name('addRoom')->middleware('CheckUser');

Route::get('/Rooms','RoomController@AllRooms')->name('listRooms');

Route::Delete('/Room/delete/{id}','RoomController@delete')->name('deleteRoom')->middleware('CheckUser');

Route::match(['get','PUT'],'/Room/edit/{id}','RoomController@edit')->name('editRoom')->middleware('CheckUser');

//inventar
Route::get('/Inventar','InventarController@listInventar')->name('listInventar');

Route::post('/Inventar/add','InventarController@add')->name('addInventar');

Route::delete('/Inventar/delete/{id}','InventarController@delete')->name('deleteInventar');

Route::get('/Inventar/promjeni/{id}','inventar_timeController@add')->name('changeInventar_time');

Route::match(['get','post'],'/Inventar/{id}','InventarController@listInventarDate')->name('listInventarDate');

//user
Route::get('/users', 'UserController@listUsers')->name('listUsers')->middleware('CheckUser');

Route::match(['get','post'],'/users/add', 'UserController@addUser')->name('addUser')->middleware('CheckUser');

Route::Delete('/users/delete/{id}', 'UserController@deleteUser')->name('deleteUser')->middleware('CheckUser');

Route::match(['get','post'],'/user/{id}', 'UserController@changeUserStatus')->name('changeUserStatus')->middleware('CheckUser');

Route::get('/{id}/{img}','WardController@showImage')->name('showImage');


});



