@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Gallery</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <form method="post"action="/dashboard/image/{{ $gallery->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" required value={{ old('title', $gallery->title) }}>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Foto</label>
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

                    <button type="submit" class="btn btn-primary text-center">Unggah Foto</button>

                </div>
                <!-- /.card-body -->
            </form>
        </section>
    </div>
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
