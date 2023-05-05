@extends('backend.layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-10">
{{-- card start --}}
<div class="card">
    <div class="card-header">
        <h5 class="card-title">
            Edit user
        </h5>
    </div>
{{-- start card body --}}
<div class="card-body">

    <form role="form" action="{{ URL::to('/update-user/' .$edit->id) }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Fullname</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Enter your fullname" value="{{ $edit->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Enter your Email Address" value="{{ $edit->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="Enter your password" value="{{ $edit->password }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="role" id="exapleFormControlSelect1" class="form-control" required>
                    <option value="admin" {{ 'admin'== $edit->role ? 'selected' : '' }}>Admin</option>
                    <option value="freelancer" {{ 'freelancer'== $edit->role ? 'selected' : '' }}>Freelancer</option>
                    <option value="employeer" {{ 'employeer'== $edit->role ? 'selected' : '' }}>Employeer</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="phone" placeholder="Enter your phone" value="{{ $edit->phone }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Address</label>
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
            <label for="name" class="col-sm-2 col-form-label">DOB</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="dob" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31">
            </div>
        </div>

        {{-- <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Attachment</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="attachment">
            </div>
        </div> --}}

    </div>
    {{-- end card body --}}
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
    </form>

</div>
</div>
{{-- card end --}}
            </div>
            <div class="col-lg-1">
                
            </div>
        </div>
    </section>
</div>
@endsection