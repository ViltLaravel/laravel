@extends('backend.layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">All Employers</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>DOB</th>
                                            <th>Info</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Status</th>
                                            <th>Verification</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employer as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                @if ($row->verified == 0)
                                                    <td style="color: red">{{ $row->name }}</td>
                                                @else
                                                    <td style="color: green">{{ $row->name }}</td>
                                                @endif
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->role }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td>{{ $row->address }}</td>
                                                <td>{{ $row->dob }}</td>
                                                <td><a style="display: flex; justify-content: center;"
                                                        href="{{ asset('attachments/' . $row->attachment) }}"
                                                        class="fas fa-save text-primary"></a></td>
                                                <td>
                                                    <a style="display: flex; justify-content: center;"
                                                        href="{{ URL::to('/edit-user/' . $row->id) }}" class="fa fa-eye"></a>
                                                </td>
                                                <td>
                                                    <a style="color: red; display: flex; justify-content: center;"
                                                        href="{{ URL::to('/delete-user/' . $row->id) }}"
                                                        class="fas fa-trash-alt" id="delete"></a>
                                                </td>
                                                <td>{{ $row->verified ? 'Verified' : 'Pending' }}</td>
                                                <td>
                                                    @if (!$row->verified)
                                                        <form action="{{ URL::to('/admin/users', $row->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-info">Verify</button>
                                                        </form>
                                                        {{-- <a href="{{ route('admin.verify', $row->id) }}">Verify</a> --}}
                                                    @else
                                                        <span class="btn btn-success">Verified</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>DOB</th>
                                            <th>Info</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Status</th>
                                            <th>Verification</th>
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
