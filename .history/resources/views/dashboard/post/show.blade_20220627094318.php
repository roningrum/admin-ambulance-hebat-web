@extends('dashboard.layouts.main-layout')
@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-8">
                <article class="blog-post">
                    <h2 class="blog-post-title my-4">{{ $posts->title }}</h2>
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