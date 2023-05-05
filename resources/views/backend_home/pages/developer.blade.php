@extends('backend_home.app')
@section('content')
<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Developers</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-primary">About</li>
                <li class="breadcrumb-item text-white active" aria-current="page">Developer</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Developer Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h1 style="color: #14a800;" class="text-center mb-5">Our Developers</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-light rounded p-4" style="border-radius: 10px;">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Bohol Island State University -Bilar Campus</p>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('backend_1/img/1650844639101.jpg') }}"
                        style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                    <div class="ps-3">
                        <h5 class="mb-1">Nicole Amoguis</h5>
                        <small>BSCS</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4" style="border-radius: 10px;">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Bohol Island State University -Bilar Campus</p>
                <div class="d-flex align-items-center">
                    <img src="https://tse4.mm.bing.net/th?id=OIP.0A1RSeVHV4YfoDGR2jUvHwHaHa&pid=Api&P=0"
                    style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                    <div class="ps-3">
                        <h5 class="mb-1">Marivic Apor</h5>
                        <small>BSCS</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4" style="border-radius: 10px;">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Bohol Island State University -Bilar Campus</p>
                <div class="d-flex align-items-center">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.BAdrtOmCjHMDXWlyWKB3YAHaHa&pid=Api&P=0"
                    style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                    <div class="ps-3">
                        <h5 class="mb-1">Kenn Addison Omapas</h5>
                        <small>BSCS</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Developer End -->
@endsection
