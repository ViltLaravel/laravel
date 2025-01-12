@extends('auth.app')
@section('content')
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" style="display: flex; align-items: center; justify-content: center;">
          <img src="{{ asset('backend_1/img/navbar_logo.png') }}" style="height: 50px;">
          <h1 style="color: black;" class="m-0 display-5">trabaho</h1>
      </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">

          <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye-slash toggle-password"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" required>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary">Sign In</button>
          </div>
        </div>
      </form>
      <p class="d-flex justify-content-center mt-2">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p>
    </div>
  </div>
</div>
@endsection
