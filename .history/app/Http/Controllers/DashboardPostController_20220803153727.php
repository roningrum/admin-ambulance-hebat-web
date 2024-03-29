<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.post.post',[
            "title"=>'post',
            "active"=>'post',
            'posts'=>Post::where('user_id', auth()->user()->id)->get()
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
        return view('dashboard.post.create',[
            'categories'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' =>'required|max:255',
            'slug' =>'required|unique:posts',
            'category_id' =>'required',
            'img_blog'=>'image|file|max:1024',
            'body'=>'required',
        ]);

        if($request->file('img_blog')){
            $validatedData['img_blog']= $request->file('img_blog')->store('post-image');
        }

        $validatedData['user_id']= auth()->user()->id;
        $validatedData['excerpt']= Str::limit(strip_tags($request->body, 200));
        $validatedData['published_at']=now();

        // var_dump($validatedData);
        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Artikel baru berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('dashboard.post.show', [
            'posts' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
             'post' => $post,
             'categories'=> Category::all()
        ]);
        // dd($post->title);
        // die();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $rules =[
            'title' =>'required|max:255',
            // 'slug' => 'required|unique:posts',
            'category_id' =>'required',
            'body'=>'required',
            'img_blog'=>'image|file|max:1024'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

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


        // $validatedData = $request->validate($rules);

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->img_blog){
            Storage::delete($post->img_blog);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Artikel berhasil dihapus');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
