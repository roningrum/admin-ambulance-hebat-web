<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $data = Post::all();
        return new ApiResource(true, 'data', $data);
    }

    public function show($id){
        $data = Post::whereId($id)->first();
        if($data){
            return new ApiResource(true, 'data', $data);
        }
        else{
            return new ApiResource(false, 'Not Found','');
        }
    }
}
