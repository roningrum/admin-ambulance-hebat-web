<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginForm(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials= $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);
        // dd('berhasil login');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()-> intended('dashboard');
        }
    }
}
