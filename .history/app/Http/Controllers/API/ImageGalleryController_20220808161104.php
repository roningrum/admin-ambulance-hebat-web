<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index(){
        $images = ImageGallery::take(4)->get();

        return new ApiResource(true, 'data', $images);
    }
}
