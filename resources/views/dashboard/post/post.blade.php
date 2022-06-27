@extends('dashboard.layouts.main-layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Daftar Artikel</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="card-body">
            <table class="table table-bordered col-lg-10">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Artikel</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <button type="button" class="btn bg-info">
                                <a href="/dashboard/post/{{ $post->slug }}">
                                    <i class="fa-solid fa-eye"></i></button>
                                </a>                          
                            <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
