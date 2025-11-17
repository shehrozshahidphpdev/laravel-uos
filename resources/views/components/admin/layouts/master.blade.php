<!doctype html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>{{ $title ?? "App" }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <meta name="color-scheme" content="light dark" />
  <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
  <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

  {{-- font awesome cdn link --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="supported-color-schemes" content="light dark" />
  {{-- ajax meta tag --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="preload" href="{{ asset('backend/assets/css/adminlte.min.css') }}" as="style" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
    onload="this.media='all'" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
    crossorigin="anonymous" />

  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/adminlte.min.css') }}" />
  {{-- custom css --}}
  <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}">
  {{-- jquery cdn link --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  {{-- trumbo css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css">
  @stack('styles')
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
  <!--begin::Third Party Plugin(OverlayScrollbars)-->

  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/assets/js/adminlte.min.js') }}"></script>
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

      // Disable OverlayScrollbars on mobile devices to prevent touch interference
      const isMobile = window.innerWidth <= 992;

      if (
        sidebarWrapper &&
        OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
        !isMobile
      ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
  @stack('scripts')
  <script>
    // toastr settings script
    toastr.options = {
      "closeButton": true,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
  </script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  {{-- trumbo editor script link --}}
  {{--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
    referrerpolicy="no-referrer"></script> --}}
  <script src="https://cdn.tiny.cloud/1/o2tn51z1a47anyadbsstx3m33i2o1dvfx3o0126wq0hysk3o/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
  {{-- others scripts --}}
  <script>
    tinymce.init({
      selector: '#tinymce-editor',
      height: 500,
      plugins: 'image link lists media table code',
      toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image link media | table | code',

      // THIS IS THE KEY: Use images_upload_handler + automatic_uploads
      automatic_uploads: true,
      images_upload_url: '/tinymce-upload',  // Laravel route

      // Optional: Better control with handler (recommended)
      images_upload_handler: function (blobInfo, progress) {
        return new Promise((resolve, reject) => {
          const xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', '/tinymce-upload');

          // CSRF Token
          const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          xhr.setRequestHeader('X-CSRF-TOKEN', token);

          xhr.upload.onprogress = (e) => {
            progress(e.loaded / e.total * 100);
          };

          xhr.onload = function () {
            if (xhr.status < 200 || xhr.status >= 300) {
              reject('HTTP Error: ' + xhr.status);
              return;
            }

            const json = JSON.parse(xhr.responseText);

            if (!json.location) {
              reject('Invalid response: ' + xhr.responseText);
              return;
            }

            resolve(json.location);
          };

          xhr.onerror = function () {
            reject('Image upload failed due to network error');
          };

          const formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());
          xhr.send(formData);
        });
      },

      // MOST IMPORTANT: This fixes "then of undefined" error
      file_picker_callback: function (callback, value, meta) {
        // Only for images
        if (meta.filetype !== 'image') return;

        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.onclick = function () {
          this.value = null; // Allow same file re-upload
        };

        input.onchange = function () {
          const file = this.files[0];
          if (!file) return;

          // Show instant preview using blob
          const reader = new FileReader();
          reader.onload = function (e) {
            callback(e.target.result, {
              alt: file.name,
              title: file.name
            });
          };
          reader.readAsDataURL(file);

          // Now upload in background (TinyMCE will replace blob URL automatically)
        };

        input.click();
      },

      // This ensures images are replaced after upload
      images_replace_blob_uris: true,
      paste_data_images: true,
    });
  </script>
</body>
<!--end::Body-->

</html>
