<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') | SIKAP Sawit</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('skydash/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('skydash/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('skydash/vendors/css/vendor.bundle.base.css') }}">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('skydash/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('skydash/images/favicon.png') }}">
  @stack('styles')
</head>

<body>
  <div class="container-scroller">
    @include('layouts.partials.navbar')

    <div class="container-fluid page-body-wrapper">
      @include('layouts.partials.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>

        @include('layouts.partials.footer')
      </div>
    </div>
  </div>

  <!-- plugins:js -->
  <script src="{{ asset('skydash/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- inject:js -->
  <script src="{{ asset('skydash/js/off-canvas.js') }}"></script>
  <script src="{{ asset('skydash/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('skydash/js/template.js') }}"></script>
  @stack('scripts')
</body>

</html>
