@extends('layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Upload Post</h1>
                        <p class="mt-3">Silakan unggah artikel yang akan di submit</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
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
                            Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more
                            examples and information about the plugin.
                        </div>
                    </div>
                </div>
                <!-- /.col-->
            </div>
        </section>
    </div>
@endsection