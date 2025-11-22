@if(session()->has('message'))
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      toastr.success("{{ session('message') }}")
    })
  </script>
@endif
@if(session()->has('error'))
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      toastr.error("{{ session('error') }}")
    })
  </script>
@endif