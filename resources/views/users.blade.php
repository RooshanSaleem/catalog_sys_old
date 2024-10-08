@extends('admin.layout.master')

@section('title', 'Users')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
   
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$show_admin_users ? 'Admin Users' : 'System Users'}}</h1>
                </div>
                @if(!$show_admin_users)
                <div class="col-sm-6 text-right" style="padding-right: 30px; padding-top: 50px;">
                    <a href="{{ route('user.create') }}" class="btn btn-success" style="width:150px; margin-right: 10px;">Add new user</a>
                    <a href="#" class="btn btn-purple">Add users via csv</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body">
                <table id="example2" class="table datatable table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="table-header">Name</th>
                            <th class="table-header">User type</th>
                            <th class="table-header">Email</th>
                            <th class="table-header">Added by</th>
                            <th class="table-header">Status</th>
                            <th class="table-header">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td class="centered-cell">{{ $user->usertype->type }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->addedBy ? $user->addedBy->email : '' }}</td>
                                <td><span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">{{ $user->is_active ? 'Active' : 'Blocked' }}</span></td>
                                <td>
                                    @if(!$show_admin_users)
                                        <a href="{{ route('users.edit', $user->id) }}" style="padding-right:5px;padding-left:5px">
                                        <i class="nav-icon fas fa-edit"></i></a>
                                        <a href="javascript:void(0);" onclick="deleteUser({{ $user->id }})">
                                        <i class="nav-icon fa fa-trash"></i>    
                                        </a>
                                    @else
                                    <a href="{{ route('admin.access_dashboard', ['id' => $user->id]) }}" class="btn btn-primary">Access Dashboard</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="table-header">Name</th>
                            <th class="table-header">User type</th>
                            <th class="table-header">Email</th>
                            <th class="table-header">Added by</th>
                            <th class="table-header">Status</th>
                            <th class="table-header">Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function() {
        jQuery('#example2').DataTable();
     });

    </script>
@endsection
