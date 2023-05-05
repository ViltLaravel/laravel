@extends('backend_home.app')
@section('content')
<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Employer's List</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item text-primary">About</li>
                <li class="breadcrumb-item text-primary">Developer</li>
                <li class="breadcrumb-item text-white active" aria-current="page">Employer</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<div class="container-xxl py-5">
    <div class="container">
        <h1 style="color: #14a800;" class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">All Employers</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    @foreach ($employer as $user)
                    <div style="background-color: #ccd5ae; border-radius: 10px;" class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <a href="/employer/{{ $user->id }}">
                                    @if($user->profile_pic)
                                        <img style="border: 3px solid #fff;" class="flex-shrink-0 img-fluid border rounded" src="{{ asset('uploads/'.$user->profile_pic) }}" alt="avatar" width="80" height="80" />
                                    @else
                                        <img style="border: 3px solid #fff;" class="flex-shrink-0 img-fluid border rounded" src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="avatar" width="80" height="80" />
                                    @endif
                                </a>
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $user->name }}</h5>
                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $user->address }}, Bohol</span>
                                    <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>{{ $user->role }}</span>
                                    <span class="text-truncate me-0" ><i class="fa fa-star text-warning me-2"></i>{{ number_format($user->avg_rating, 1) }}/5 rating ({{ $user->count_freelancer }})</span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a style="background-color:transparent; border-color:transparent;" class="btn btn-light btn-square me-3" href="/rating/employer/{{ $user->id }}"><i class="fa fa-comments text-primary"></i></a>
                                    <a style="border-radius: 50px;" class="btn btn-outline-primary" href="/all/rating/employer/{{ $user->id }}">View Reviews</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $user->created_at }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <form action="{{ route('employer') }}" method="POST">
                        @csrf
                        <button style="border-radius: 50px; text-transform:capitalize" class="btn btn-outline-{{ $red1 }}" type="submit">{{ $show1 }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div


{{-- MODAL EMPLOYER START --}}
{{-- <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @foreach ($employer as $users )
        <div class="modal-body" value="{{ $users->id }}">
            {{ $users->name }}
        </div>
        @endforeach
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}
{{-- MODAL EMPLOYER END --}}
@endsection
