@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Foto Kegiatan</h1>
                        <p class="mt-3">Foto Kegiatan Ambulance Hebat</p>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card-body">
            <button type="button" class="btn bg-primary">
                <a href="/dashboard/image/create">
                    <i class="fa-solid fa-circle-plus"></i>
                    Tambah Upload
                </a>
            </button>

            <div class="gallery mt-3">
                <div class="row no-gutters">
                    @foreach ($imagegalleries as $gallery )
                    <div class="col-md-4">
                        <img src="{{  asset('storage/'.$posts->image)  }}" class="img-fluid" alt="">
                    </div>
                    @endforeach
                   
                </div>
            </div>
        
        </div>
    </div>
    </div>
@endsection
