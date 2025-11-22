@if ($errors->any())
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      @foreach ($errors->all() as $error)
        toastr.error("{{ $error }}");
      @endforeach
                  });
  </script>
@endif