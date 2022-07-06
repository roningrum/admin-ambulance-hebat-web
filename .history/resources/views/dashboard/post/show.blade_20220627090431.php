@extends('dashboard.layouts.main-layout')
@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article class="blog-post">
                    <h2 class="blog-post-title mb-4">{{ $posts->title }}</h2>
                    <div class="d-flex mb-5">
                        <div class="bio-pic mr-3">
                            <i class="fa-solid fa-user me-2"></i> 
                        </div>
                        <div class="vcard">
                            <span class="d-block">
                                <a href="/authors/{{$posts->user->username}}" class="text-decoration-none">{{ $posts->user->username }}</a> in <a href="/categories/{{ $posts->category->slug }}" class="text-decoration-none"> {{ $posts->category->name }}</a>
                            </span>
                            <span>
                               January 2022 
                            </span>
                        </div>
                    </div>
                    <img src= "{{ asset($posts->img_blog)}}" class="img-fluid"alt="">

                    <div class="mt-3">
                        {!! $posts->body !!}
                    </div>

                <div class="pt-3">
                    <p>Kategori :
                        <a href="/categories/{{ $posts->category->slug }}" class="text-decoration-none"> {{ $posts->category->name }}</a>
                    </p>
                </div>
                <a href="/artikel" class="d-block mt-5 text-decoration-none">Kembali ke Artikel</a>
                </article>
            </div>
        </div>         
    </div>
</div>
@endsection