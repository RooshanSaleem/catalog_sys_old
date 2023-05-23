@extends('admin.layout.master')

@section('title', 'New User')

@section('content')
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add New User</h1>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" id="addForm" action="{{ route('user.add', $user->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text" name="address" value="{{ old('address', $user->address) }}"
                            required class="form-control @error('address') is-invalid @enderror">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                            required class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="user_type">User Type</label>
                        <select id="user_type" name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                            <option value="1" @if($user->user_type == 1) selected @endif>Option 1</option>
                            <option value="2" @if($user->user_type == 2) selected @endif>Option 2</option>
                            <option value="3" @if($user->user_type == 3) selected @endif>Option 3</option>
                        </select>
                        @error('user_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input id="discount" type="text" name="discount"
                            value="{{ old('discount', $user->discount) }}" required
                            class="form-control @error('discount') is-invalid @enderror">
                        @error('discount')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="updateButton">Update</button>
                        <a href="{{ route('users') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
