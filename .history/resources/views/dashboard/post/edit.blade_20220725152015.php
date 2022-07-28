@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <h1>Edit Artikel</h1>
                        <p class="mt-3">Silakan unggah artikel yang akan di submit</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <form method="post" action="/dashboard/posts/{{ $post->slug }}"enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Judul Post</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    </div>
                    <div class="mb-3">
                        <label for="img_blog" class="form-label">Upload Foto</label>
                        <input type="hidden" name="oldImage" value="{{ $post->img_blog }}">
                        @if ($post->img_blog)
                        <img src="{{asset('storage/'.$post->img_blog)}}"class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('img_blog') is-invalid @enderror" type="file" id="img_blog"
                            name="img_blog" onchange="previewImage()">
                        @error('img_blog')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Ubah Post</button>

                </div>
                <!-- /.card-body -->

            </form>
        </section>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#img_blog');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
