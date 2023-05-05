@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Logo</h1>
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
                <form  action="{{ URL('/logo-update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="text-center">
                            @if($logo)
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('Logo/'.$logo->logo_pic) }}" alt="logo" id="myImage">
                            @else
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="User profile picture" id="myImage">
                            @endif    
                        </div>
                        <br>
                        <h5 style="text-align: center; font-weight:bold">E-TRABAHO</h5>
                        <hr>
                <div style="display:flex; text-align:center; justify-content:center; align-items:center; gap:4px">
                    <label for="myFileInput" class="btn btn-primary btn-sm mb-2">Browse</label>
                    <input type="file" name="logo_pic" id="myFileInput" style="display: none;">
                    <input style="font-weight:bold" type="submit" name="" value="Save" class="btn btn-danger btn-sm mb-2">
                </div>
                </form>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
</section>

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