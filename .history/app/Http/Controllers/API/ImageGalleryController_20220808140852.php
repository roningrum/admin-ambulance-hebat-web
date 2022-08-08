<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageGalleryResource;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index(){
        $images = ImageGallery::take(4)->get();

        return new ImageGalleryResource(true, 'data', $images);
    }
}
