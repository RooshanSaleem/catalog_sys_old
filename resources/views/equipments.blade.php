@extends('admin.layout.master')
@section('title', 'Equipment')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Equipments</h1>
                    </div>
                    <div class="col-sm-6 text-right" style="padding-right: 30px; padding-top: 50px;">
                    <a href="#" class="btn btn-orange" style="width:165px; margin-right: 10px;">Change code details</a>
                        <a href="#" class="btn btn-success" style="width:165px; margin-right: 10px;">Add new equipment</a>
                        <a href="#" class="btn btn-purple">Add items via csv</a>

                    </div>
                </div>
            </div>
        </div>
    <!-- /.content-header -->

    <section>
        <div class="content">
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
                    <table id="equipment_table" class="table datatable table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="table-header">Code</th>
                                <th class="table-header">Short description</th>
                                <th class="table-header">Detailed description</th>
                                <th class="table-header">Validity Starts</th>
                                <th class="table-header">Validity Ends</th>
                                <th class="table-header">Price (€)</th>
                                <th class="table-header">Units available</th>
                                <th class="table-header">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipments as $equipment)
                                <tr>
                                    <td class="centered-cell">{{ $equipment->code }}</td>
                                    <td>{{ $equipment->short_description }}</td>
                                    <td>{{ $equipment->detailed_description }}</td>
                                    <td class="centered-cell">{{$equipment->validity_starts}}</td>
                                    <td class="centered-cell">{{$equipment->validity_ends}}</td>
                                    <td class="centered-cell">{{ $equipment->price }}</td>
                                    <td class="centered-cell">{{ $equipment->unite_for_sale }}</td>
                                    <td><a href="{{route('equipment.edit', $equipment->id)}}" style="padding-right:5px;padding-left:5px">
                                            <i class="nav-icon fas fa-edit"></i></a>
                                            <a href="javascript:void(0);" onclick="deleteEquipment({{$equipment->id}})">
                                            <i class="nav-icon fa fa-trash"></i> </td> 
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th class="table-header">Code</th>
                                <th class="table-header">Short description</th>
                                <th class="table-header">Detailed description</th>
                                <th class="table-header">Validity Starts</th>
                                <th class="table-header">Validity Ends</th>
                                <th class="table-header">Price (€)</th>
                                <th class="table-header">Unit available</th>
                                <th class="table-header">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function() {
        jQuery('#equipment_table').DataTable();
     });

    </script>
@endsection