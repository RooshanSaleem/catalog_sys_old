@extends('admin.layout.master')
@section('title', 'Equipment Details')
@section('content')
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit equipment details</h1>
                </div>
            </div>
        </div>
    <!-- /.content-header -->
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="updateForm" action="{{ route('equipment.update', $equipment->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="code">Code </label>
                                <input id="code" type="text" name="code" value="{{old('code', $equipment->code)}}" required
                                class="form-control @error('code') is-invalid @enderror">
                                @error('code')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <input id="short_description" type="text" name="short_description" value="{{old('short_description', $equipment->short_description)}}" required
                                class="form-control @error('short_description') is-invalid @enderror">
                                @error('short_description')
                                <div class="invalid-feedback">{{$message}} </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="detailed_description">Detailed description</label>
                                <input id="detailed_description" type="text" name="detailed_description" value="{{old('detailed_description', $equipment->detailed_description)}}" required
                                class="form-control @error('detailed_description') is-invalid @enderror">
                                @error('detailed_description')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="text" name="price" value="{{old('price', $equipment->price)}}" required
                                class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="unite_for_sale">Units available</label>
                                <input id="unite_for_sale" type="text" name="unite_for_sale" value="{{old('unite_for_sale', $equipment->unite_for_sale)}}" required
                                class="form-control @error('unite_for_sale') is-invalid @enderror">
                                @error('unite_for_sale')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button id="updateButton" type="submit" class="btn btn-primary">Update</button>
                                <a href="{{route('equipments')}}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </section>
@endsection