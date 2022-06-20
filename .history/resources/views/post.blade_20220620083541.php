@extends('layouts.main-layout')
@section('content')
<div class="conten-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Text Editors</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Text Editors</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <section class="content">
        <div class="row">
            <div class="col-12 mx-auto">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Summernote
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <textarea id="summernote">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>
                <div class="card-footer">
                  Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>
    </section>
 
    <!-- /.col-->
</div>
<!-- ./row -->
</div>
@endsection