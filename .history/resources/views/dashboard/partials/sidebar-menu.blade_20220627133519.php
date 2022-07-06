<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
       <span class="brand-text font-weight-light">Ambulance Hebat Web<br>Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @auth
          <a href="#" class="d-block">Halo, {{ auth()->user()->name }}</a>
          @endauth
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active':'' }}">
              <i class="fa fa-duotone fa-house-blank"></i>
              <p>Beranda</p>
              {{-- <p>
                Beranda
              </p> --}}
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/post/create-post" class="nav-link {{ Request::is('dashboard/post/create') ? 'active':'' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Buat Post
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/post" class="nav-link {{ Request::is('dashboard/post*') ? 'active':'' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Daftar Post
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/input-foto" class="nav-link {{ Request::is('input-foto') ? 'active':'' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Foto Kegiatan
              </p>
            </a>
          </li>
  
          <li class="nav-item">
            <a href="/daftar-feedback" class="nav-link {{ Request::is('daftar-feedback') ? 'active':'' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Tanya dan Keluhan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>