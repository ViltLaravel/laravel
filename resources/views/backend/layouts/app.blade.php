<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>etrabaho | Dashboard</title>

  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">

    {{-- LOGO ON NULL CONDITION --}}
    @isset($logo)
        <?php if ($logo->logo_pic == null) { ?>
            <link rel="shortcut icon" type="image/png" href="http://pluspng.com/img-png/logo-template-png-logo-templates-1655.png">
        <?php } else { ?>
            <link rel="shortcut icon" type="image/png" href="{{ asset('Logo/'.$logo->logo_pic) }}">
        <?php } ?>
    @endisset
    {{-- LOGO ON NULL CONDITION --}}

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Toaster Notification -->
  <link rel="stylesheet" href="{{asset('toaster/toastr.min.css')}}">
  <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.css') }}">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
  <style>
      body {
          font-family: 'Poppins', sans-serif;
      }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('backend_1/img/preloading.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('backend.layouts.navbar')
 
  @include('backend.layouts.sidebar')

  @yield('content')

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>

<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>
<script>
  $(document).ready(function(){
    $('.js-example-basic-multiple').select2();
    $('.select2-selection__choice').css('color','white');
    $('.select2-selection__choice').css('background-color','#28a745');
    $('.select2-selection__choice__remove').css('color','white');
  });
</script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/pages/dashboard2.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Start Toaster & Sweetalert -->
<script src="{{ asset('toaster/toastr.min.js')}}"></script>
<script src="{{ asset('toaster/sweetalert.min.js') }}"></script>

{{-- page-history --}}
<script src="{{ asset('404/404.js') }}"></script>

<script>
  @if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
             toastr.info("{{ Session::get('message') }}");
             break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
           toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
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

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
    document.getElementById('resume-file').addEventListener('change', function() {
      var fileName = this.value.split('\\').pop();
      var label = document.querySelector('.custom-file-label');
      label.textContent = fileName;
    });
</script>
</body>
</html>
