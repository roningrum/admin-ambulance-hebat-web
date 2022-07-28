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

            <div class="photography mt-5">
                <div class="row no-gutters">
                    @foreach ($gallery as $img )
                    <div class="col-md-4">
                        <a href="#" class="pop">
                            <img src="{{ asset('storage/'.$img->image) }}" 
                            height="200px"
                            alt="Foto kegiaan">
                        </a>
                     
                        {{-- <button type="button" class="btn bg-info">
                            <a href="#">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </button> --}}
                        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal"><span 
                                            aria-hidden="true">&times;</span><span class="sr- 
                                            only">Close</span></button>						        
                                           <img src="" class="imagepreview" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
    
                        </div>
                    </div>
                  
                    @endforeach
                   
                </div>
            </div>

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
                            <td>{{ $gallery->title}}</td>
                            <td>{{ $post->image}}</td>
                            <td>
                                <button type="button" class="btn bg-info">
                                    <a href="/dashboard/posts/{{ $post->slug }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </button>
                                <a href="/dashboard/posts/{{ $post->slug }}/edit">
                                    <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i>
                                    </button>
                                </a>
                             
                                <form action="/dashboard/posts/{{ $post->slug }}"method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger"onclick="return confirm('Yakin Ingin Menghapus?')"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
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
