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
              <h3 class="card-title">Inbox</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Freelancer Name</th>
                  <th>Freelancer Email</th>
                  <th>Reason</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($freelancer as $key => $response)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $response->name }}</td>
                    <td>{{ $response->email }}</td>
                    <td>{{ $response->emp_message }}</td>
                    <td>
                      <form action="{{ route('delete.response') }}" method="POST">
                        @csrf
                          <input type="hidden" name="decline" value="{{ $response->id }}">
                          <button style="border:none; color: red;" class="fa fa-trash-alt"></button>
                      </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Freelancer Name</th>
                        <th>Freelancer Email</th>
                        <th>Reason</th>
                        <th>Action</th>
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
