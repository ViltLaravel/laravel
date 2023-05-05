<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>etrabaho | Registration</title>

  <link href="{{ asset('backend_1/img/preloading.png') }}" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <!-- Toaster Notification -->
  <link rel="stylesheet" href="{{asset('toaster/toastr.min.css')}}">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="/" style="display: flex; align-items: center; justify-content: center;">
          <img src="{{ asset('backend_1/img/navbar_logo.png') }}" style="height: 50px;">
          <h1 style="font-family: 'Ubuntu', sans-serif; color: black;" class="m-0 display-5">trabaho</h1>
        </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <!--<span class="fas fa-lock"></span>-->
              <span class="fas fa-eye-slash toggle-password"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <!--<span class="fas fa-lock"></span>-->
              <span class="fas fa-eye-slash toggle-password"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          {{-- <label for="attachment">Attachment</label> --}}
          <input class="form-control" id="attachment" type="file" name="attachment" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-paperclip"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <select class="form-control" name="address">
            <option value="" selected>Address</option>
            @foreach ($address as $al)
            <option value="{{ $al->name }}">{{ $al->name }}</option>
            @endforeach
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-paper-plane"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input id="dob" class="form-control" type="date" name="dob" placeholder="dd-mm-yyyy" value="{{ date('Y-m-d') }}" min="1997-01-01" max="2030-12-31" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">+63</span>
            </div>
            <input id="phone" name="phone" type="number" class="form-control" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <select class="form-control" name="role" required>
              <option value="">--Select Role--</option>
              <option value="employer">Employer</option>
              <option value="freelancer">Freelancer</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-briefcase"></span>
            </div>
          </div>
      </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>




      {{-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> --}}

      <a href="{{ asset('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>

<!-- Start Toaster & Sweetalert -->
<script src="{{ asset('toaster/toastr.min.js')}}"></script>
<script src="{{ asset('toaster/sweetalert.min.js') }}"></script>

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
</body>
</html>
