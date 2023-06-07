@extends('admin.layout.master')
@section('title', 'Glossary')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Glossary</h1>
                    </div>
                    <div class="col-sm-6 text-right" style="padding-right: 30px; padding-top: 50px;">
                    <a href="{{route('languages.create')}}" class="btn btn-orange" style="width:150px; margin-right: 10px;">Add new language</a>
                        <a href="{{route('glossary.create')}}" class="btn btn-success" style="width:150px; margin-right: 10px;">Add new item</a>
                        <a href="#" class="btn btn-purple">Add items via csv</a>

                    </div>

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
                                <th class="table-header">Item ID</th>
                                @foreach ($languages as $language)
                                    <th class="table-header">{{ $language->language }}</th>
                                @endforeach
                                    <th class="table-header">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $groupedItems = $glossaryItems->groupBy('item_id');
                            @endphp
                            @foreach ($groupedItems as $itemID => $items)
                                <tr>
                                <td class="centered-cell">{{ $itemID }}</td>
                                    @foreach ($languages as $language)
                                        @php
                                            $filteredItems = $items->where('language_id', $language->id);
                                            $itemNames = $filteredItems->pluck('item_name')->implode(', ');
                                        @endphp
                                        <td>{{ $itemNames }}</td>
                                    @endforeach
                                        <td><a href="{{ route('glossary.edit', $itemID) }}" style="padding-right:5px;padding-left:5px">
                                            <i class="nav-icon fas fa-edit"></i></a>
                                            <a href="#">  
                                            <i class="nav-icon fa fa-trash"></i>    
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="table-header">Item ID</th>
                                @foreach ($languages as $language)
                                    <th class="table-header">{{ $language->language }}</th>
                                @endforeach
                                    <th class="table-header">Actions</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

    </section>
@endsection('content')