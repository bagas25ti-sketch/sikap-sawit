<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5 font-weight-bold text-primary" href="{{ route('dashboard') }}">SIKAP Sawit</a>
    <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
      <img src="{{ asset('skydash/images/logo-mini.svg') }}" alt="logo">
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <form action="{{ route('perlengkapan.index') }}" method="GET">
          <div class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search"><i class="icon-search"></i></span>
            </div>
            <input type="text" name="q" class="form-control" id="navbar-search-input"
              placeholder="Cari perlengkapan..." aria-label="search" aria-describedby="search"
              value="{{ request('q') }}">
          </div>
        </form>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img src="{{ asset('skydash/images/faces/face28.jpg') }}" alt="profile">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <span class="dropdown-item disabled">
            <i class="ti-user text-primary"></i> Admin / Petugas Gudang
          </span>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
