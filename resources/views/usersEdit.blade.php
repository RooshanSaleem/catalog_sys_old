@extends('admin.layout.master')

@section('title', isset($user) ? 'Edit User Details' : 'Add New User')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($user->id) ? 'Edit User Details' : 'Add New User' }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="updateForm" action="{{ isset($user->id) ? route('users.update', $user) : route('users.store') }}">
                        @csrf
                        @if (isset($user->id))
                            @method('PUT')
                        @endif
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" value="{{ old('name', isset($user->id) ? $user->name : '') }}" required
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_type">User Type</label>
                            <select id="user_type" name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                                <option value="1" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 1) selected @endif>Admin</option>
                                <option value="2" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 2) selected @endif>Customer</option>
                                <option value="3" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 3) selected @endif>End client</option>
                            </select>
                            @error('user_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email', isset($user->id) ? $user->email : '') }}"
                                required class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone', isset($user->id) ? $user->phone : '') }}"
                                required class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input id="address" type="text" name="address" value="{{ old('address', isset($user->id) ? $user->address : '') }}"
                                required class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" value="{{ old('password', isset($user->id) ? $user->password : '') }}" required
                                class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input id="discount" type="text" name="discount"
                                value="{{ old('discount', isset($user->id) ? $user->discount : '') }}" required
                                class="form-control @error('discount') is-invalid @enderror">
                            @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            @if (isset($user->id))
                                <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                            @else

                                <button type="submit" class="btn btn-primary" id="updateButton">Add</button>
                            @endif
                            <a href="{{ route('users') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
