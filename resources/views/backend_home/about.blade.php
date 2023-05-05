@extends('backend_home.app')
@section('content')
 <!-- About Start -->
 <!-- Header End -->
 <div style="font-family: 'Jost', sans-serif;" class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 id="typewriters" class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- About Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden" id="image-slider">
                        <div class="col-6 text-start">
                            <img style="border-radius: 10px;" class="img-fluid w-100" src="{{ asset('backend_1/img/im_1.jpeg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="{{ asset('backend_1/img/img_2.jpeg') }}"
                            style="border-radius: 10px;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="{{ asset('backend_1/img/img_3.jpeg') }}" style="border-radius: 10px;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="{{ asset('backend_1/img/img5.jpeg') }}" style="border-radius: 10px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 style="color: #14a800;" class="mb-4">We Help To And Find A Talent</h1>
                    <p class="mb-4">Forget the old rules. You can have the best people.Right now. Right here.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>No cost to join.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Hire top talent.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Work with the best—without breaking the bank.</p>
                        <div style="display: flex;">
                            <div style="margin-right: 10px;">
                                <a style="border-radius: 50px;" class="btn btn-primary" href="{{ route('register') }}">Sign up for free</a>
                            </div>
                            <div>
                            <a style="border-radius: 50px;" class="btn btn-outline-primary" href="/">Learn how to hire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- About End -->
@endsection
