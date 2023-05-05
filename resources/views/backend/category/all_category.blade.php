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
              <h3 class="card-title">All Job Title</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Job Title</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($all as $key => $row )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->categoryname }}</td>
                    <td>
                        <a style="display: flex; justify-content: center;" href="{{ URL::to('/edit-jobtitle/'.$row->id) }}" class="fa fa-eye"></a>
                    </td>
                    <td>
                        <a style="color: red;" href="{{ URL::to('/delete-jobtitle/'.$row->id) }}" class="fas fa-trash-alt" id="delete"></a>
                    </td>
                </tr>

                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Job Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
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
