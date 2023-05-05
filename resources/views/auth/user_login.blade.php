@extends('auth.app')
@section('content')
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
        <a href="#" style="display: flex; align-items: center; justify-content: center;">
          <img src="{{ asset('backend_1/img/navbar_logo.png') }}" style="height: 50px;">
          <h1 style="font-family: 'Ubuntu', sans-serif; color: black;" class="m-0 display-5">trabaho</h1>
        </a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">{{ auth()->user()->name }}</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      @if(auth()->user()->profile_pic)
        <img
        src="{{ asset('uploads/'.auth()->user()->profile_pic) }}" alt="avatar">
      @else
        <img
        src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="User profile picture" id="myImage">
      @endif
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="{{ route('unlock') }}">
        @csrf
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                <!--@error('password')-->
                <!--    <span class="invalid-feedback" role="alert">-->
                <!--        <strong>{{ $message }}</strong>-->
                <!--    </span>-->
                <!--@enderror-->

                <div class="input-group-append">
                <button type="submit" class="btn">
                    <i class="fas fa-arrow-right text-muted"></i>
                </button>
                </div>
            </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Or sign in as a different user</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2022-2023 <b><a href="#" class="text-black">etrabaho</a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

@endsection
