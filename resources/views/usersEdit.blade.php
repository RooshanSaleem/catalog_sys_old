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
                                <option value="1" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 1) selected @endif>Super admin</option>
                                <option value="2" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 2) selected @endif>Admin</option>
                                <option value="3" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 3) selected @endif>Technical writer</option>
                                <option value="4" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 4) selected @endif>Dealer</option>
                                <option value="5" @if(old('user_type', isset($user->id) ? $user->user_type : '') == 5) selected @endif>End client</option>
                            </select>
                            @error('user_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Access Control section -->
                        
                        <div class="form-group" style="display: @if(isset($user) && isset($user->userType) && in_array($user->userType->type, ['tech_writer','dealer','end_client'])) block @else none @endif; background-color: #F3F7FA;" id="accessControlSection">

                            <label for="permissions"> Access Control</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="table-header">Menu</th>
                                        <th class="table-header">View</th>
                                        <th class="table-header">Edit</th>
                                        <th class="table-header">Add</th>
                                        <th class="table-header">Delete</th>
                                        <th class="table-header">Show in Menu</th>
                                        <th class="table-header">Select All</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td><b>{{ ucwords($menu->menu_item) }}</b></td>
                                        <td>
                                            <div style="text-align: center;">
                                                <input type="checkbox" name="permissions[{{ $menu->id }}][view]" value="1"
                                                    {{ isset($userPermissionsArray[$menu->id]['view']) && $userPermissionsArray[$menu->id]['view'] == 1 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                <input type="checkbox" name="permissions[{{ $menu->id }}][edit]" value="1"
                                                    {{ isset($userPermissionsArray[$menu->id]['edit']) && $userPermissionsArray[$menu->id]['edit'] == 1 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                <input type="checkbox" name="permissions[{{ $menu->id }}][add]" value="1"
                                                    {{ isset($userPermissionsArray[$menu->id]['add']) && $userPermissionsArray[$menu->id]['add'] == 1 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                <input type="checkbox" name="permissions[{{ $menu->id }}][delete]" value="1"
                                                    {{ isset($userPermissionsArray[$menu->id]['delete']) && $userPermissionsArray[$menu->id]['delete'] == 1 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                <input type="checkbox" name="permissions[{{ $menu->id }}][show_in_menu]" value="1"
                                                    {{ isset($userPermissionsArray[$menu->id]['show_in_menu']) && $userPermissionsArray[$menu->id]['show_in_menu'] == 1 ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                <input type="checkbox" class="check-all" data-menu-id="{{ $menu->id }}" onclick="checkAllPermissions({{ $menu->id }})">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /Access Control section-->

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
                            <label for="discount">Discount</label>
                            <input id="discount" type="text" name="discount"
                                value="{{ old('discount', isset($user->id) ? $user->discount : '') }}" required
                                class="form-control @error('discount') is-invalid @enderror">
                            @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select id="is_active" name="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                <option value="1" @if(old('is_active', $user->is_active) == 1) selected @endif>Active</option>
                                <option value="0" @if(old('is_active', $user->is_active) == 0) selected @endif>Blocked</option>
                            </select>
                            @error('is_active')
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

@section('scripts')
    <script>
        $(document).ready(function() {
            var userTypeDropdown = $('#user_type');
            userTypeDropdown.on('change', function() {
                var selectedUserType = $(this).find('option:selected').text();

                if (selectedUserType === 'Technical writer' || selectedUserType === 'Dealer' || selectedUserType === 'End client' ) {
                    $('#accessControlSection').show();
                } else {
                    $('#accessControlSection').hide();
                }
            });
        });

    </script>
@endsection
