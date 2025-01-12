<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-TRABAHO Account Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      </style>
      <style>
          body {
              font-family: 'Poppins', sans-serif;
          }
      </style>
</head>
<body>
        <div class="card text-center">
            <div class="card-header">
                Account Verification
            </div>
            <div class="card-body">
              <h5 class="card-title">Verification Process</h5>
              <p class="card-text">"Your account is currently pending verification from the admin."</p>

              <a href="{{ route('logout') }}" class="btn btn-primary"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Home</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
            <div class="card-footer text-muted">
                <footer class="main-footer">
                  <strong>Copyright &copy; 2022-2023.</strong>
                  All rights reserved.
                  <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                  </div>
                </footer>
                  E-TRABAHO
              </div>
          </div>

    {{-- SWEETALERT START --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('success'))
    <script>
        swal("Verification Process!", "{{ session('success') }}", "success");
    </script>
    @endif

    @if (session('warning'))
        <script>
            swal("Warning!", "{{ session('warning') }}", "warning");
        </script>
    @endif
    {{-- SWEETALERT END --}}
</body>
</html>
