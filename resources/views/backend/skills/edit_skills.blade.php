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
            Edit Skills
        </h5>
    </div>
{{-- start card body --}}
<div class="card-body">

    <form role="form" action="{{ URL::to('/update-skills/' .$edit->id) }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Skills</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="skills_name" placeholder="Enter Skills name" value="{{ $edit->skills_name }}" oninput="this.value=this.value.toUpperCase()">
            </div>
        </div>
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
