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
    return view('login');
});
Route::get('/dashboard', function(){
    return view('dashboard',[
        "title" => "dashboard"
    ]);
});
Route::get('/input-post', function(){
    return view('post',[
        "title" =>"input-post"
    ]);
});
Route::get('/input-foto', function(){
    return view('upload-gallery',[
        "title" =>"input-foto"
    ]);
});
Route::get('/daftar-post', function(){
    return view('daftar-post',[
        "title" =>"input-foto"
    ]);
});

