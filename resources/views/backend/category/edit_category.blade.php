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
            Edit Job Title
        </h5>
    </div>
{{-- start card body --}}
<div class="card-body">

    <form role="form" action="{{ URL::to('/update-jobtitle/' .$edit->id) }}" method="post">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Job Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="categoryname" placeholder="Enter Category name" value="{{ $edit->categoryname }}" oninput="this.value=this.value.toUpperCase()">
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
