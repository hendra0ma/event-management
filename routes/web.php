<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


//untuk controller event
Route::get('/home',"Event@index");
Route::get('/home/insert',"Event@insert");
Route::get('/home/delete/{id}',"Event@delete");
Route::post('/home/update/{id}',"Event@update");


//untuk controller peralatan
Route::get('/home/peralatan',"Peralatan@index");
Route::post('/home/peralatan/insert',"Peralatan@insert");
Route::get('/home/peralatan/delete/{id}',"Peralatan@delete");
Route::post('/home/peralatan/update/{id}',"Peralatan@update");

//untuk controller kegiatan
Route::post('/home/kegiatan/insert',"Kegiatan@insert");
Route::get('/home/kegiatan/delete/{id}',"Kegiatan@delete");


