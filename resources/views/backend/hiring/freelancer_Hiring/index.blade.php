@extends('backend.layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Employers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" name="hagjong">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Employer Name</th>
                  <th>Employer Email</th>
                  <th>Info</th>
                  <th>Message</th>
                  <th>Action</th>
                  <th>Action</th>
                  <th>Status</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($employeer as $key => $employ)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $employ->name }}</td>
                      <td>{{ $employ->email }}</td>
                      <td>
                        <a style="align-items: center; display:flex; justify-content:center;" href="{{ asset('emp_Attachment/'.$employ->emp_attachment) }}" class="fa fa-save"></a>
                      </td>
                      <td>{{ $employ->emp_message }}</td>
                      <td>
                        <form action="{{ route('accept.employer') }}" method="POST">
                          @csrf
                          <input type="hidden" name="status" value="{{ $employ->id }}">
                          @if ( $employ->status == 1 )
                            <button disabled class="btn btn-primary">Accepted</button>
                          @else
                            <button class="btn btn-success" type="submit">Accept</button>
                          @endif
                        </form>
                      </td>
                      <td>
                        <form action="{{ route('delete.employer') }}" method="POST">
                          @csrf
                          <input type="hidden" name="decline" value="{{ $employ->id }}">
                          <button class="btn btn-danger" type="submit">Decline</button>
                        </form>
                      </td>
                      <td>
                        @if($employ->status == 1)
                          <button disabled class="btn btn-success">In Contract</button>
                        @else
                          <button disabled class="btn btn-warning">Pending</button>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Employer Name</th>
                        <th>Employer Email</th>
                        <th>Info</th>
                        <th>Message</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>

  @endsection
