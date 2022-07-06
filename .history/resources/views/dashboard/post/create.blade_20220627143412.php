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
                    <input type="text" class="form-control" id="title">
                  </div>
                  <div class="form-group">
                    <label>Kategori Post</label>
                    <select class="form-control">
                      <option>option 1</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slug</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Judul Post">
                  </div>
                  <div class="form-group">
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
                  </div>

                  <div class="form-group">
                    <label>Isi Post Artikel</label>
                    <textarea class="form-control" rows="5" cols="10" placeholder="Enter ..."></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary text-center">Upload</button>
                </div>
              </form>
        </section>
    </div>
    {{-- <script>
        
    </script> --}}
@endsection
