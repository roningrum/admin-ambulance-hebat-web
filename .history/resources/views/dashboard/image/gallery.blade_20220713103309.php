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
        <section class="gallery">
            <button type="button" class="btn bg-primary my-2">
                <a href="/dashboard/posts/create">
                    <i class="fa-solid fa-circle-plus"></i>
                    Tambah Post Baru
                </a>
            </button>
        </section>
    </div>
    <div>

    </div>
@endsection
