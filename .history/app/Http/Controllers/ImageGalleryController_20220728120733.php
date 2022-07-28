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
    public function edit($id)
    {
        $item = ImageGallery::findOrFail($id);
        return view('dashboard.image.edit',[
            'image'=>$item
        ]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageGalleryRequest  $request
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageGalleryRequest $request, $id)
    {
        //
        $data = $request->all();
        $rules =[
            'title' =>'required|max:255',
            // 'slug' => 'required|unique:posts',
            'image'=>'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);
           
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']= $request->file('image')->store('post-image');
        }

        $validatedData['user_id']= auth()->user()->id;

        // var_dump($validatedData);
        // die();

        ImageGallery::where('id', $id)
        ->update($validatedData);

        return redirect('/dashboard/images')->with('success', 'Artikel baru berhasil diubah');

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
