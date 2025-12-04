@props(['title'])

<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{{ $title ?? "App" }}</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
  <meta name="supported-color-schemes" content="light dark" />

  {{-- AJAX CSRF --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Preload --}}
  <link rel="preload" href="{{ asset('backend/assets/css/adminlte.min.css') }}" as="style" />

  {{-- Fonts --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
    onload="this.media='all'" />

  {{-- Overlay Scrollbars --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />

  {{-- Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />

  {{-- AdminLTE --}}
  <link rel="stylesheet" href="{{ asset('backend/assets/css/adminlte.min.css') }}" />

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}">

  {{-- jQuery --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  {{-- Toastr CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  {{-- Trumbowyg CSS --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css">

  @stack('styles')

  <style>
    .card-body {
      overflow-x: auto !important;
    }
  </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <div class="app-wrapper">

    <x-admin.layouts.header />
    <x-admin.layouts.aside />

    <main class="app-main">
      {{ $slot }}
    </main>

    <x-admin.layouts.footer />

  </div>

  {{-- Overlay Scrollbars --}}
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>

  {{-- PopperJS --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>

  {{-- Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

  {{-- AdminLTE --}}
  <script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>

  <script src="{{ asset('backend/assets/js/sidebar.js') }}"></script>

  {{-- ApexCharts --}}
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

  @stack('scripts')

  {{-- Toastr Settings --}}
  <script src="{{ asset('backend/assets/js/toastr.js') }}"> </script>

  {{-- Toastr JS cdn link --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  {{-- TinyMCE Editor cdn link --}}
  <script src="https://cdn.tiny.cloud/1/o2tn51z1a47anyadbsstx3m33i2o1dvfx3o0126wq0hysk3o/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
  {{-- TinyMCE Editor cdn Settings --}}
  <script src="{{ asset('backend/assets/js/tiny-mce.js') }}"></script>

</body>

</html>
