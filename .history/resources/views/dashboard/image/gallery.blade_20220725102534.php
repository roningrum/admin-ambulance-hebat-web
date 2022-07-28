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

            <div class="mt-4">
                <table class="table table-bordered col-lg-10">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Kegiatan</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $img)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $img->title}}</td>
                                <td>
                                    <a href="#" class="pop">
                                        <img src="{{ asset('storage/'.$img->image) }}" 
                                        height="200px"
                                        class="img-thumbnail"
                                        alt="Foto kegiaan">
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn bg-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger"onclick="return confirm('Yakin Ingin Menghapus?')"><i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

         
        
        </div>
        <script>
            $(function() {
              $('.pop').on('click', function() {
                $('.imagepreview').attr('src',$(this).find('img').attr('src'));
                $('#imagemodal').modal('show');   
                });		
            });
         </script>
    </div>
    
@endsection
