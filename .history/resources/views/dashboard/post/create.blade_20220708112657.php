@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <h1>Upload Post</h1>
                        <p class="mt-3">Silakan unggah artikel yang akan di submit</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Judul Post</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value={{ old('title') }}>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                  
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value={{ old('slug') }}>
                    </div>
                    <div class="form-group mb-3">
                        <label>Kategori Post</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id?'selected':'' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="img_blog" class="form-label">Upload Foto</label>
                        <input class="form-control @error('img_blog') is-invalid @enderror" type="file" id="img_blog" name="img_blog">
                        @error('img_blog')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                      </div>

                    <div class="form-group">
                        <label for="slug">Body</label>
                        @error('body')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                        <trix-editor input="body"></trix-editor>
                    </div>

                    <button type="submit" class="btn btn-primary text-center">Buat Post</button>

                </div>
                <!-- /.card-body -->

            </form>
        </section>
    </div>
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });
    </script>
@endsection
