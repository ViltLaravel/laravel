<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>etrabaho | Registration</title>

  <link href="{{ asset('backend_1/img/preloading.png') }}" rel="icon">
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset('toaster/toastr.min.css')}}">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  </style>
  <style>
      body {
          font-family: 'Poppins', sans-serif;
      }
</style>
</head>
<body class="hold-transition register-page" style="margin: 20px">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="/" style="display: flex; align-items: center; justify-content: center;">
          <img src="{{ asset('backend_1/img/navbar_logo.png') }}" style="height: 50px;">
          <h1 style="color: black;" class="m-0 display-5">trabaho</h1>
        </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required oninput="this.value=this.value.toUpperCase()">
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
              <span class="fas fa-eye-slash toggle-password"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye-slash toggle-password"></span>
            </div>
          </div>
        </div>

        <label style="font-weight:500;">Attachment <span style="font-size: 0.8rem; font-style:italic;">( Valid Id or Bio Data )</span></label>
        <label style="font-weight: 400; color:red; font-size:0.8em;">( <span style="color: black; font-style:italic;">Note:</span> pdf / doc / docx / png / jpeg / jpg / gif / max:2MB )</label>
        <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="attachment" name="attachment" required>
              <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
            </div>
        </div>

        <label style="font-weight:500;">Address</label>
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

        <label style="font-weight:500;">Date of Birth</label>
        <div class="input-group mb-3">
          <input id="dob" class="form-control" type="date" name="dob" placeholder="dd-mm-yyyy" value="{{ date('Y-m-d') }}" min="1997-01-01" max="2030-12-31" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>

        <label style="font-weight:500;">Phone</label>
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

        <label style="font-weight:500;">Role</label>
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

        <div class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center">
          <div>
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a  data-toggle="modal" data-target="#term" href="#">terms</a>
              </label>
            </div>
          </div>
          <div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>


    {{-- Agreement Modal --}}
    <div class="modal fade" id="term" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Terms and Conditions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body" style="text-align: justify;  text-indent: 20px;">
                Welcome to our freelancing website! By accessing and using this website, you agree to abide by the following terms and conditions. Our website is a platform that connects freelancers with clients who are seeking their services. As a freelancer, you are responsible for providing accurate information about your skills, experience, and availability. Clients are responsible for verifying the credentials of freelancers and ensuring that their work meets their requirements. Our website is not responsible for the quality, timeliness, or legality of the work performed by freelancers. We reserve the right to terminate your account at any time for any reason, including violation of our policies or failure to meet client expectations.
            </div>
            <div class="modal-body" style="text-align: justify;  text-indent: 20px;">
                By using our website, you agree to indemnify us and hold us harmless from any claims, damages, or liabilities arising from your use of our platform. These terms and conditions are subject to change at any time without prior notice, so please check back periodically for updates.
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Agree</button>
            </div>
        </div>
        </div>
    </div>
    {{-- Agreement Modal --}}

      <div class="d-flex justify-content-center">
        <a href="{{ asset('login') }}" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>
</div>

<script>
  console.log(@json($address), 'test')
</script>


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

{{-- for-making-the-label-to-filename --}}
<script>
    document.getElementById('attachment').addEventListener('change', function() {
      var fileName = this.value.split('\\').pop();
      var label = document.querySelector('.custom-file-label');
      label.textContent = fileName;
    });
</script>
</body>
</html>
