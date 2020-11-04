<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link text-center">
    <img src="{{ asset('img/brand/logo-white.png')}}" alt="AdminLTE Logo"style="opacity: .8;width: 60%;">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ Avatar::create(Auth::user()->name)->setTheme('grayscale-dark')->setFontSize(40)->setShape('square')->toBase64() }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" data-widget="tree">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ Route('/') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ Route('kandidat') }}" class="nav-link {{ request()->is('dashboard/kandidat', 'dashboard/kandidat/add', ) || (Route::currentRouteName() == 'editKandidat') || (Route::currentRouteName() == 'showKandidat') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Data Kandidat
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ Route('peserta') }}" class="nav-link {{ request()->is('dashboard/peserta', 'dashboard/peserta/add', ) || (Route::currentRouteName() == 'editPeserta') || (Route::currentRouteName() == 'showPeserta') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Data Peserta
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>