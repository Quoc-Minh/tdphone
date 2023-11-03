<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
  <!-- CSS files -->
  <link href="{{ asset('assets/admin/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
  <style>
    @import url('https://rsms.me/inter/inter.css');

    :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }
  </style>
</head>

<body>

  <div class="toast-container">

  </div>

  <div class="page">
    <!-- Sidebar -->
    @include('admin.common.sidebar')
    <!-- Navbar -->
    @include('admin.common.header')

    <div class="page-wrapper">
      @yield('alert')

      <!-- Page header -->
      @yield('page-header')

      {{-- Page body --}}
      @yield('page-body')
    </div>
  </div>

  <!-- Libs JS -->
  @yield('Libs')
  <!-- Tabler Core -->
  <script src="{{ asset('assets/admin/dist/js/tabler.min.js?1684106062') }}" defer></script>
  @yield('js')
</body>

</html>