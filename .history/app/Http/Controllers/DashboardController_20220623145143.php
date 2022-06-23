<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('daftar-post',[
            'post'=> Post::all();
        ]);
    }
}
