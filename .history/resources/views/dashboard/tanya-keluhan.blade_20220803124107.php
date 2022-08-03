@extends('dashboard.layouts.main-layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tanya dan Keluhan</h1>
                    <p class="mt-3">Daftar Feedback dan pertanyaan dari customer</p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedback as $masukan )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $masukan->name }}</td>
                    <td>{{ $masukan->email }}</td>
                    <td>{{ $masukan->subjek }}</td>
                    <td>{{ $masukan->pesan }}</td>
                    <td>
                        <button type="button" class="btn btn-primary"><i class="fa-solid fa-envelope"></i></button>
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </td>
                </tr>

                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection