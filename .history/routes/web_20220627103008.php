<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function(){
    return view('dashboard.dashboard',[
        "title" => "dashboard"
    ]);
})->middleware('auth');
Route::get('/input-post', function(){
    return view('post',[
        "title" =>"input-post"
    ]);
});
Route::get('/input-foto', function(){
    return view('dashboard.upload-gallery',[
        "title" =>"input-foto"
    ]);
});
Route::get('/daftar-post', function(){
    return view('daftar-post',[
        "title" =>"daftar-post"
    ]);
});
Route::get('/daftar-feedback', function(){
    return view('tanya-keluhan',[
        "title" =>"tanya-keluhan"
    ]);
});

Route::resource('/dashboard/post', DashboardPostController::class)->middleware('auth');
Route::get('/',[Admin\Auth\LoginController::class, 'loginForm']);
Route::post('/',[Admin\Auth\LoginController::class, 'authenticate'])->name('login');
Route::post('/logout',[Admin\Auth\LoginController::class, 'logout']);