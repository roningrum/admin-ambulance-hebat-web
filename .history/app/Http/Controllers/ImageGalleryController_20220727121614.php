<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use App\Http\Requests\StoreImageGalleryRequest;
use App\Http\Requests\UpdateImageGalleryRequest;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.image.gallery',[
            'gallery'=>ImageGallery::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.image.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageGalleryRequest $request)
    {
        //
        $validatedData = $request ->validate([
            'title' => 'required',
            'image'=>'image|file|max:1024',
        ]);
        if($request->file('image')){
            $validatedData['image']= $request->file('image')->store('post-image');
        }
        $validatedData['user_id']= auth()->user()->id;
        ImageGallery::create($validatedData);
        return redirect('dashboard/image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ImageGallery $imageGallery)
    {
        //
        return view('dashboard.image.gallery',[
            'image'=>$imageGallery
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageGallery $imageGallery)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageGalleryRequest  $request
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageGalleryRequest $request, ImageGallery $imageGallery)
    {
        //
        $rules =[
            'title' =>'required|max:255',
            // 'slug' => 'required|unique:posts',
            'img_blog'=>'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);
           
        if($request->file('img_blog')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['img_blog']= $request->file('img_blog')->store('post-image');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->body, 200));

        // var_dump($validatedData);
        // die();

        Post::where('id', $post->id)
        ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Artikel baru berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $imageGallery)
    {
        //
    }
}
