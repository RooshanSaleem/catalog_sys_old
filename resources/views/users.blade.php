@extends('admin.layout.master')

@section('title', 'Users')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">System Users</h1>
                </div>
                <div class="col-sm-6 text-right" style="padding-right: 30px; padding-top: 50px;">
                    <a href="{{ route('user.create') }}" class="btn btn-success" style="width:150px; margin-right: 10px;">Add new user</a>
                    <a href="#" class="btn" style="background-color: #6610f2; color: white; width:150px;">Add users via csv</a>
                </div>

            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card-body">
                <table id="example2" class="table datatable table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="table-header">Name</th>
                            <th class="table-header">Email</th>
                            <th class="table-header">Address</th>
                            <th class="table-header">User type</th>
                            <th class="table-header">Discount</th>
                            <th class="table-header">Added by</th>
                            <th class="table-header">Registered at</th>
                            <th class="table-header">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="centered-cell">{{ $user->usertype->type }}</td>
                                <td class="centered-cell">{{ $user->discount }}</td>
                                <td>{{ $user->addedBy->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td><a href="{{ route('users.edit', $user->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="table-header">Name</th>
                            <th class="table-header">Email</th>
                            <th class="table-header">Address</th>
                            <th class="table-header">User type</th>
                            <th class="table-header">Discount</th>
                            <th class="table-header">Added by</th>
                            <th class="table-header">Registered at</th>
                            <th class="table-header">Edit</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#example2').DataTable();
        });
    </script>
@endsection
