<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;
use App\Models\Post as ModelsPost;

class DashboardController extends Controller
{
    //
    public function index(){
        return Post::all();
        // return view('daftar-post',[
        //     'post'=> Post::all()
        // ]);
    }
}
