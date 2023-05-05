@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <form  action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="text-center">
                        @if(auth()->user()->profile_pic)
                          <img class="profile-user-img img-fluid img-circle"
                          src="{{ asset('uploads/'.auth()->user()->profile_pic) }}" alt="User profile picture" id="myImage">
                        @else
                          <img class="profile-user-img img-fluid img-circle"
                          src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="User profile picture" id="myImage">
                        @endif
                    </div>

              <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

              <p class="text-muted text-center">{{ auth()->user()->email }}</p>
              <div style="display:flex; text-align:center; justify-content:center; align-items:center; gap:4px">
                <label for="myFileInput" class="btn btn-primary btn-sm mb-2">Browse</label>
                <input type="file" name="profile_pic" id="myFileInput" style="display: none;">
                <input style="font-weight:bold" type="submit" name="" value="Save" class="btn btn-danger btn-sm mb-2">
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            @if (auth()->user()->role == 'admin')
            <div class="card-body">

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
              <p class="text-muted">{{ auth()->user()->address }}, Bohol</p>
              <hr>

              <strong><i class="fas fa fa-phone mr-1"></i> Phone</strong>
              <p class="text-muted">{{ auth()->user()->phone }}</p>
              <hr>

              <strong><i class="fas far fa-calendar-alt mr-1"></i> Date of Birth</strong>
              <p class="text-muted">{{ auth()->user()->dob }}</p>
              <hr>

              <strong><i class="fas far fa-user-alt mr-1"></i> Gender</strong>
              <p class="text-muted">{{ auth()->user()->gender }}</p>
              <hr>

              <strong><i class="fa fa-paper-plane mr-1"></i>Role</strong>
              <p class="text-muted">{{ auth()->user()->role }}</p>

            </div>
            @elseif (auth()->user()->role == 'freelancer')
              <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa fa-pencil-alt mr-1"></i> Skills</strong>

              <p class="text-muted">
                @foreach ($freelancer_skill as $skills )
                <span style="font-size:.7em; margin-bottom: .5rem;" class="btn btn-success">{{ $skills->skills_name }} </span>
                @endforeach
              </p>

              <hr>

              <strong><i class="fas fa fa-money-bill-alt mr-1"></i> Salary Rate</strong>

              <p class="text-muted">
                <p class="text-muted">{{ auth()->user()->salary }}.00/hour</p>
              </p>

              <hr>


              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">{{ auth()->user()->address }}, Bohol</p>

              <hr>

              <strong><i class="fas far fa-calendar-alt mr-1"></i> Date of Birth</strong>

              <p class="text-muted">
                {{ auth()->user()->dob }}
              </p>

              <hr>

              <strong><i class="fas fa fa-file-alt mr-1"></i> Job Title</strong>
              @foreach ($freelancerski as $ski)
              <p class="text-muted">
                {{ $ski->categoryname }}
              </p>
              @endforeach

              <hr>

              <strong><i class="fas fa fa-phone mr-1"></i> Phone</strong>

              <p class="text-muted">
                {{ auth()->user()->phone }}
              </p>

              <hr>

              <strong><i class="fas fa fa-user-alt mr-1"></i> Gender</strong>

              <p class="text-muted">{{ auth()->user()->gender }}</p>

              <hr>


              <strong><i class="fas fa fa-paper-plane mr-1"></i>Role</strong>

              <p class="text-muted">
                {{ auth()->user()->role }}
              </p>
            </div>
            <!-- /.card-body -->
            @elseif(auth()->user()->role == 'employer')
            <div class="card-body">

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
              <p class="text-muted">{{ auth()->user()->address }}, Bohol</p>
              <hr>

              <strong><i class="fas fa fa-phone mr-1"></i> Phone</strong>
              <p class="text-muted">{{ auth()->user()->phone }}</p>
              <hr>

              <strong><i class="fas far fa-calendar-alt mr-1"></i> Date of Birth</strong>
              <p class="text-muted">{{ auth()->user()->dob }}</p>
              <hr>

              <strong><i class="fas far fa-user-alt mr-1"></i> Gender</strong>
              <p class="text-muted">{{ auth()->user()->gender }}</p>
              <hr>

              <strong><i class="fa fa-paper-plane mr-1"></i>Role</strong>
              <p class="text-muted">{{ auth()->user()->role }}</p>

            </div>
            @endif
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                @if (auth()->user()->role == 'admin')
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#changepass" data-toggle="tab">Change Password</a></li>
                @elseif(auth()->user()->role == 'freelancer')
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#changepass" data-toggle="tab">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="#resume" data-toggle="tab">Resume</a></li>
                @else
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#changepass" data-toggle="tab">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="#resume" data-toggle="tab">Resume</a></li>
                @endif
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                {{-- SETTINGS DROPDOWN --}}
                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (auth()->user()->role == 'admin')
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" value="{{ auth()->user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ auth()->user()->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="address">
                        <option value="{{ $myuser->address }}" selected>{{ $myuser->address }}</option>
                        @foreach ($address as $al)
                        <option value="{{ $al->name }}">{{ $al->name }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Date of Birth</label>
                      <div class="col-sm-10">
                        <input name="dob" type="date" class="form-control" id="inputSkills" value="{{ auth()->user()->dob }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input name="phone" type="number" class="form-control" id="inputName" placeholder="Phone" value="{{ auth()->user()->phone }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender">
                          @if (auth()->user()->gender == null)
                            <option value="">Select Gender</option>
                          @endif
                          <option value="{{ auth()->user()->gender }}">{{ auth()->user()->gender }}</option>
                          <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                          <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                          <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others</option>
                      </select>
                      </div>
                    </div>
                    @elseif(auth()->user()->role == 'freelancer')
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input name="name" type="name" class="form-control" id="inputName" placeholder="Name" value="{{ auth()->user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ auth()->user()->email }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                      <select class="form-control js-example-basic-multiple" name="skills[]" multiple ="multiple">
                        @foreach ($freelancer_skill as $skil )
                        <option value="{{ $skil->id }}" selected>{{ $skil->skills_name }}</option>
                        @endforeach
                        @foreach ($skill as $al)
                        <option value="{{ $al->id }}">{{ $al->skills_name }}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputSalary" class="col-sm-2 col-form-label">Salary Rate</label>
                      <div class="col-sm-10">
                        <input name="salary" type="number" class="form-control" id="inputSalary" placeholder="Salary Rate / per hour" value="{{ auth()->user()->salary }}">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender">
                          @if (auth()->user()->gender == null)
                            <option value="">Select Gender</option>
                          @endif
                          <option value="{{ auth()->user()->gender }}">{{ auth()->user()->gender }}</option>
                          <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                          <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                          <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others</option>
                      </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Job Title</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="category">
                          @foreach ($freelancerski as $al)
                            <option value="{{ $al->id }}" selected>{{ $al->categoryname }}</option>
                          @endforeach
                          @foreach($jobtitle as $al)
                          <option value="{{ $al->id }}">{{ $al->categoryname }}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="address">
                        <option value="{{ $myuser->address }}" selected>{{ $myuser->address }}</option>
                        @foreach ($address as $al)
                        <option value="{{ $al->name }}">{{ $al->name }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Date of Birth</label>
                      <div class="col-sm-10">
                        <input name="dob" type="date" class="form-control" id="inputSkills" value="{{ auth()->user()->dob }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input name="phone" type="number" class="form-control" id="inputName" placeholder="Phone" value="{{ auth()->user()->phone }}">
                      </div>
                    </div>
                    @else
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="inputName" placeholder="Name" value="{{ auth()->user()->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ auth()->user()->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="address">
                        <option value="{{ $myuser->address }}" selected>{{ $myuser->address }}</option>
                        @foreach ($address as $al)
                        <option value="{{ $al->name }}">{{ $al->name }}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="gender">
                        <option value="" selected>{{ auth()->user()->gender }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Date of Birth</label>
                      <div class="col-sm-10">
                        <input name="dob" type="date" class="form-control" id="inputSkills" value="{{ auth()->user()->dob }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input name="phone" type="number" class="form-control" id="inputName" placeholder="Phone" value="{{ auth()->user()->phone }}">
                      </div>
                    </div>
                    @endif
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                {{-- SETTINGS DROPDOWN --}}

                {{-- CHANGEPASSWORD DROPDOWN --}}
                <div class="tab-pane" id="changepass">
                  <form class="form-horizontal" action="{{ route('update.profile.info') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                      <div class="col-sm-10">
                        <input name="password1" type="password" class="form-control" id="password1" placeholder="Old Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                      <div class="col-sm-10">
                        <input name="password2" type="password" class="form-control" id="password2" placeholder="New Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                {{-- CHANGEPASSWORD DROPDOWN --}}

                {{-- ADDRESUME DROPDOWN --}}
                <div class="tab-pane" id="resume">
                  <form class="form-horizontal" action="{{ route('update.resume') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Resume/CV</label>
                      <div class="col-sm-10">
                        <input name="resume" type="file" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                {{--  ADDRESUME DROPDOWN --}}

              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2022-2023 <a href="">E-TRABAHO</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  var fileInput = document.getElementById("myFileInput");
  var img = document.getElementById("myImage");
  fileInput.addEventListener("change", function() {
    var file = fileInput.files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
      img.src = event.target.result;
    };
    reader.readAsDataURL(file);
  });
</script>

@endsection
