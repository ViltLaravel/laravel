@extends('backend_home.app')
@section('content')
    <!-- Carousel Start -->
    <div style="font-family: 'Jost', sans-serif;" class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="backend_1/img/bg1.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4" id="typewriter"> Online Market Place
                                </h1>
                                <!-- <a style="border-radius: 50px" href="{{ route('register') }}" class="btn btn-outline-light">Get started</a> -->
                                    <a href="{{route('register')}}">
                                        <button class="cssbuttons-io-button"> Get started
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                                            </div>
                                        </button>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="backend_1/img/bg2.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4" id="typewriter">The Best Startup Job
                                    </h1>
                                    <!-- <a style="border-radius: 50px" href="{{ route('register') }}" class="btn btn-outline-light">Get started</a> -->
                                    <a href="{{route('login')}}">
                                        <button class="cssbuttons-io-button"> Get started
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                                            </div>
                                        </button>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Search Start -->
      <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
          <div class="container">
              <div class="row g-2">
                  <div class="col-md-10">
                      <div class="row g-2">
                      <div class="row g-2">
                        <div class="col-md-4">
                            <div style="display: flex;" class="input-group">
                                <div style="margin-right: 10px;">
                                    <select class="form-select rounded-pill" id="mySelect" aria-label="Search category">
                                        <option selected disabled>Search Talent</option>
                                        @foreach ($all as $al)
                                            <option value="{{ $al->id }}">{{ $al->categoryname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button id="myButton" class="btn btn-outline-light rounded-pill" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    <!-- Search End -->


    <!-- Search Result Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center">
            <div class="tab-content">
                <div class="freelancer"></div>
                     <div style="display: flex; justify-content:center; align-items:center">
                        <button id="show-more-btn" style="border-radius: 50px" class="btn btn-outline-primary">Show More</button>
                     </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Search Result End -->

    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 style="color: #14a800;" class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Category</h1>
            <div class="row g-4">

                @if (is_object($countme) && count($countme) > 0)
                    @foreach ($countme as $job)
                        @if (isset($job->categoryname))
                            <div style="display: flex; justify-content:center; align-items:center" class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div>
                                    <span style="display: flex; justify-content: center; align-items: center" class="fa fa-2x fa-layer-group text-primary mb-3"></span>
                                    <h6 style="display: flex; justify-content:center; align-items:center" class="mb-3">
                                        {{ $job->categoryname }}
                                    </h6>
                                    <a href="{{ route('landingpage') }}">
                                        <p style="display: flex; justify-content: center; align-items: center; font-size: 1em" class="text-primary">{{ $job->count }} skills</p>
                                    </a>
                                </div>
                            </div>
                                @if (!$showAll && $loop->iteration == 4)
                                    <div class="col-lg-12 text-center">
                                        <a style="border-radius: 50px" href="{{ route('landingpage', ['show_all' => 1]) }}" class="btn btn-outline-primary">Show more</a>
                                    </div>
                                    @break
                                @endif
                        @endif
                    @endforeach
                        @if ($showAll)
                        <div class="col-lg-12 text-center">
                            <a style="border-radius: 50px;" href="{{ route('landingpage') }}" class="btn btn-outline-danger">
                                Show less
                            </a>
                        </div>
                        @endif
                @endif

            </div>
        </div>
    </div>
    <!-- Category End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden" id="image-slider">
                        <div class="col-6 text-start">
                            <img style="border-radius: 10px;" class="img-fluid" src="{{ asset('backend_1/img/1.png') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="{{ asset('backend_1/img/2.png') }}"
                            style="border-radius: 10px;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="{{ asset('backend_1/img/3.png') }}" style="border-radius: 10px;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="{{ asset('backend_1/img/4.png') }}" style="border-radius: 10px;">
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


    <!-- Freelancer Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 style="color: #14a800;" class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Freelancers</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul style="background-color: #27AE60 ; padding: 30px; border-radius: 10px" class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            @foreach ($jobtitle as $job)
                                <li class="nav-item">
                                    <button style="border: none; background-color: transparent;" value="{{ $job->id }}" class="fetch-data-btn">
                                      <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill"
                                          href="#freelancer{{ $job->id }}" data-target="#freelancer{{ $job->id }}">
                                          <h6 style=" color: #fff;" class="mt-n1 mb-0">{{ $job->categoryname }}</h6>
                                      </a>
                                    </button>
                                </li>
                            @endforeach
                    </ul>
                    <div class="tab-content">
                        <div class="samplc"></div>
                          <div class="tab-pane fade show p-0 active"></div>

                            <div style="display: flex; justify-content:center; align-items:center">
                                <button id="show-btn" style="border-radius: 50px" class="btn btn-outline-primary">Show More</button>
                            </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Freelancing List -->

    {{-- START MODAL --}}
        <div class="modal fade" id="modalContent">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Freelancer Details</h4>
                        <button type="button" class="btn btn-danger close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Content Wrapper. Contains page content -->
                      <section style="background-color: #eee;" id="modalView">

                      </section>



                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger close" data-dismiss="modal">Close</button>
                      </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    {{-- END MODAL --}}

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 style="color: #14a800;" class="text-center mb-5">Our Clients Say!!!</h1>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Great Website</p>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('backend_1/img/1650844639101.jpg') }}"
                        style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                        <div class="ps-3">
                            <h5 class="mb-1">Nicole Amoguis</h5>
                            <small>Software Engineer</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Excellent website</p>
                    <div class="d-flex align-items-center">
                        <img src="https://tse3.mm.bing.net/th?id=OIP.evVt32Vz1srnuF_cQ73kfAHaHa&pid=Api&P=0"
                        style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                        <div class="ps-3">
                            <h5 class="mb-1">Sharmaine Catana</h5>
                            <small>Business Women</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Outstanding website</p>
                    <div class="d-flex align-items-center">
                        <img src="https://tse4.mm.bing.net/th?id=OIP.0A1RSeVHV4YfoDGR2jUvHwHaHa&pid=Api&P=0"
                        style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                        <div class="ps-3">
                            <h5 class="mb-1">Jeanny Amoguis</h5>
                            <small>Police</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Exceptional website</p>
                    <div class="d-flex align-items-center">
                        <img src="https://tse1.mm.bing.net/th?id=OIP.BAdrtOmCjHMDXWlyWKB3YAHaHa&pid=Api&P=0"
                        style="width: 50px; height: 50px; border-radius: 50px; border: 2px solid #fff">
                        <div class="ps-3">
                            <h5 class="mb-1">Dilmar Amoguis</h5>
                            <small>Mechanics</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
@endsection
