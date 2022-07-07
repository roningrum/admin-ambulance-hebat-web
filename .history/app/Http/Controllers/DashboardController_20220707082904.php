<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $posts= Post::where('user_id', auth()->user()->id);
        // $users = User::where('role','admin')->count();

        return view('dashboard.dashboard', compact('posts'));
    }
}
