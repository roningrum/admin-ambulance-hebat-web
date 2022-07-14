@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Foto Kegiatan</h1>
                        <p class="mt-3">Foto Kegiatan Ambulance Hebat</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Nama Kegiatan</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" required value={{ old('title') }}>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img_blog" class="form-label">Upload Foto</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('img_blog') is-invalid @enderror" type="file" id="img_blog"
                    name="img_blog" onchange="previewImage()">
                @error('img_blog')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary text-center">Unggah Foto</button>

        </div>
        <section class="gallery">
            <button type="button" class="btn bg-primary my-3">
                <a href="/dashboard/posts/create">
                    <i class="fa-solid fa-circle-plus"></i>
                    Tambah Upload
                </a>
            </button>
        </section>
    </div>
    <div>

    </div>
@endsection
