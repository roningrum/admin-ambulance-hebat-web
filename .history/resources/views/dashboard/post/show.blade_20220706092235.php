@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row py-3">
                <div class="col-lg-8">
                    <article class="blog-post">
                        <h2 class="blog-post-title mb-3">{{ $posts->title }}</h2>
                        <a href="/dashboard/posts" class="btn btn-success">
                            <i class="fa-solid fa-angle-left"></i>
                            Kembali ke Tabel</a>
                        <a href="" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Ubah</a>
                        <a href="" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i>
                            Hapus</a>

                        <img src="https://source.unsplash.com/1200x400?{{ $posts->category->name }}"
                            class="img-fluid my-3"alt="">
                        <div class="mt-3">
                            {!! $posts->body !!}
                        </div>

                        <div class="pt-3">
                            <p>Kategori :
                                <a href="/categories/{{ $posts->category->slug }}" class="text-decoration-none">
                                    {{ $posts->category->name }}</a>
                            </p>
                        </div>

                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
