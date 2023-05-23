@extends('admin.layout.master')
@section('title', 'Equipment')
@section('content')
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All equipments</h1>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.content-header -->

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="card-body">
                    <table id="equipment_table" class="table datatable table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="table-header">Code</th>
                                <th class="table-header">Short description</th>
                                <th class="table-header">Detailed description</th>
                                <th class="table-header">Price (€)</th>
                                <th class="table-header">Units available</th>
                                <th class="table-header">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipments as $equipment)
                                <tr>
                                    <td class="centered-cell">{{ $equipment->code }}</td>
                                    <td>{{ $equipment->short_description }}</td>
                                    <td>{{ $equipment->detailed_description }}</td>
                                    <td class="centered-cell">{{ $equipment->price }}</td>
                                    <td class="centered-cell">{{ $equipment->unite_for_sale }}</td>
                                    <td><a href="{{route('equipment.edit', $equipment->id)}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="table-header">Code</th>
                                <th class="table-header">Short description</th>
                                <th class="table-header">Detailed description</th>
                                <th class="table-header">Price (€)</th>
                                <th class="table-header">Unit available</th>
                                <th class="table-header">Edit</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection