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
            <form method="post" action="/dashboard/post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Judul Post</label>
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                  {{-- <div class="form-group">
                    <label>Kategori Post</label>
                    <select class="form-control">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div> --}}
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputFile">Unggah Foto Kegiatan</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> --}}

                  {{-- <div class="form-group">
                    <label>Isi Post Artikel</label>
                    <textarea class="form-control" rows="5" cols="10" placeholder="Enter ..."></textarea>
                  </div> --}}

                  <button type="submit" class="btn btn-primary text-center">Buat Post</button>

                </div>
                <!-- /.card-body -->
               
              </form>
        </section>
    </div>
    <script>
       const title= document.querySelector('#title'); 
       const slug= document.querySelector('#slug'); 

       title.addEventListener('change', function(){
        fetch('/dashboard/post/createSlug?title=' + title.value)
        .then(response => response.json())
        .then(data=> slug.value = data.slug)
       });
    </script>
@endsection
