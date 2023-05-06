@extends('backend_home.app')

@section('content')
<section style="background-color: #fff;">
    <div class="container my-5 py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div style="border-color: #fff;" class="card text-dark">
            <div class="card-body p-4">
                <a href="{{ route('admin.employer') }}">
                    <button class="btn btn-dark">Back</button>
                </a>
              <h4 style="color: #14a800;" class="mb-0">Recent Comments</h4>
              <p class="fw-light mb-4 pb-2">Latest Comments section by Freelancers</p>
            </div>

            @foreach ($freelancers as $freelance )
            @foreach ($freelance->employer_comment as $employer)
            <div style="background-color: #ccd5ae; border-radius: 10px;" class="card-body p-4">
                <div class="d-flex flex-start">

                @if($employer->profile_pic)
                    <img style="border: 3px solid #fff;" class="rounded-circle shadow-1-strong me-3" src="{{ asset('uploads/'.$employer->profile_pic) }}" alt="avatar" width="65" height="65" />
                @else
                    <img style="border: 3px solid #fff;" class="rounded-circle shadow-1-strong me-3" src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="avatar" width="65" height="65" />
                @endif

                  <div>
                    <h6 class="fw-bold mb-1">{{ $employer->name }}</h6>

                    <div class="d-flex align-items-center mb-3">
                      <p class="mb-0">
                        {{ $employer->contract_period }}
                        @if ($employer->freelancer_rating == 1)
                            <span class="badge bg-danger">Very Unsatisfied</span>
                        @elseif ($employer->freelancer_rating == 2)
                            <span class="badge bg-warning">Unsatisfied</span>
                        @elseif ($employer->freelancer_rating == 3)
                            <span class="badge bg-info">Neutral</span>
                        @elseif ($employer->freelancer_rating == 4)
                            <span class="badge bg-primary">Satisfied</span>
                        @elseif ($employer->freelancer_rating == 5)
                            <span class="badge bg-success">Very Satisfied</span>
                        @endif

                      </p>
                      <span class="fas fa-star ms-2 text-warning"><span style="font-family: 'Jost', sans-serif; color: black; font-weight: 400;"> {{ $employer->freelancer_rating }}.0/5 rating</span></span>
                    </div>
                    <p class="mb-0">
                        <h5>Message</h5>
                        <textarea style="border-radius: 10px; padding-left: 5px;" cols="30" disabled rows="3" placeholder="{{ $employer->freelancer_feedback }}"></textarea>
                    </p>
                  </div>
                </div>
              </div>

              <hr class="my-0" style="height: 10px; color:#fff;" />
              @endforeach
              @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
