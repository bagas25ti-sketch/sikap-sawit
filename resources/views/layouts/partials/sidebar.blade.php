@php
  $perlengkapanAktif = request()->routeIs('perlengkapan.*');
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item {{ $perlengkapanAktif ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#menu-perlengkapan"
        aria-expanded="{{ $perlengkapanAktif ? 'true' : 'false' }}" aria-controls="menu-perlengkapan">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Perlengkapan K3</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ $perlengkapanAktif ? 'show' : '' }}" id="menu-perlengkapan">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('perlengkapan.index') ? 'active' : '' }}"
              href="{{ route('perlengkapan.index') }}">Data Perlengkapan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('perlengkapan.create') ? 'active' : '' }}"
              href="{{ route('perlengkapan.create') }}">Tambah Perlengkapan</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
