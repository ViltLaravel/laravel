<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>etrabaho | Login</title>

  <link href="{{ asset('backend_1/img/preloading.png') }}" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">

  <!-- Toaster Notification -->
  <link rel="stylesheet" href="{{asset('toaster/toastr.min.css')}}">

</head>

<body class="hold-transition login-page hold-transition lockscreen">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('backend_1/img/preloading.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @yield('content')


<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>

<!-- Start Toaster & Sweetalert -->
<script src="{{ asset('toaster/toastr.min.js')}}"></script>
<script>
    @if(Session::has('notification'))
        var type="{{Session::get('notification.alert-type','info')}}";
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('notification.message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('notification.message') }}");
                break;
            case 'warning':
               toastr.warning("{{ Session::get('notification.message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('notification.message') }}");
                break;
        }
    @endif
</script>

{{-- SWEETALERT START --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('success'))
    <script>
        swal("Success!", "{{ session('success') }}", "success");
    </script>
    @endif

    @if (session('warning'))
        <script>
            swal("Warning!", "{{ session('warning') }}", "warning");
        </script>
    @endif
{{-- SWEETALERT END --}}

<script>
  $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you Want to delete?",
           text: "Once Delete, This will be Permanently Delete!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             swal("Safe Data!");
           }
         });
     });
</script>

<script>
  // Toggle password visibility
  $(document).on('click', '.toggle-password', function() {
    $(this).toggleClass('fa-eye fa-eye-slash');
    var input = $(this).closest('.input-group').find('input');
    if (input.attr('type') === 'password') {
      input.attr('type', 'text');
    } else {
      input.attr('type', 'password');
    }
  });
</script>

<!-- End Toaster & Sweetalert -->


<script>
  document.getElementById('attachment').addEventListener('change', function() {
    var fileName = this.value.split('\\').pop();
    var label = document.querySelector('.custom-file-label');
    label.textContent = fileName;
  });
</script>

</body>
</html>
