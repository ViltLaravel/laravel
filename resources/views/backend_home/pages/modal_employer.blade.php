@extends('backend_home.app')
@section('content')

    @foreach ($user as $users)
    <section style="background-color: #eee;">
        <div class="container py-5">
          <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.employer') }}">Employer List</a></li>
                </ol>
              </nav>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                @if($users->profile_pic)
                    <img class="rounded-circle img-fluid" style="width: 150px;" src="{{ asset('uploads/'.$users->profile_pic) }}" alt="avatar"/>
                @else
                    <img class="rounded-circle img-fluid" style="width: 150px;" src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="avatar"/>
                @endif
                  <h5 class="my-3">{{ $users->name }}</h5>
                  <p class="text-muted mb-1">{{ $users->email }}</p>
                  <p class="text-muted mb-4">{{ $users->address }}, Bohol</p>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="/rating/employer/{{ $users->id }}">
                    <button type="button" class="btn btn-primary">Rating</button>
                    </a>
                    <a href="/all/rating/employer/{{ $users->id }}">
                    <button type="button" class="btn btn-outline-primary ms-1">Reviews</button>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                  <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fas fa-at fa-lg text-warning"></i>
                      <p class="mb-0">{{ $users->email }}</p>
                    </li>
                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                      <p class="mb-0">@mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                      <p class="mb-0">mdbootstrap</p>
                    </li> --}}
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $users->name }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $users->email }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $users->phone }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $users->address }}, Bohol</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $users->gender }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Date of Birth</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $users->dob }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <p class="mb-4"><span class="text-primary font-italic me-1">Attachment</span> Resume
                      </p>

                    @if ( $users->resume == null )
                      <button class="btn btn-danger">No Resume</button>
                    @else
                      <a href="{{ asset('resume/'. $users->resume) }}"><button class="btn btn-primary">Download CV</button></a>
                    @endif

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endforeach
@endsection
