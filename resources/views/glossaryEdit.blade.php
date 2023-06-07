@extends('admin.layout.master')
@section('title', isset($glossaryItem) ? 'Edit Glossary' : 'Add Glossary')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1 class="m-0">{{isset($glossaryItem->id) ? 'Edit Glossary Item' : 'Add New Glossary Item'}}</h1>
                    </div>
                </div>
            </div>
    </div>

    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ isset($glossaryItem->id) ? route('glossary.update', $glossaryItem->id) : route('glossary.store') }}">
                    @csrf
                    @if (isset($glossaryItem->id))
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="item_id">Item ID:</label>
                        <input type="text" name="item_id" id="item_id" class="form-control" value="{{ old('item_id', isset($glossaryItem->id) ? $glossaryItem->item_id : $lastItemId +1) }}" readonly> 
                    </div>

                    <div class="form-group">    
                        <label>Item Names: </label>

                        @foreach ($languages as $language)
                            <br>
                            @if(isset($glossaryItem->id))
                            @php
                                $glossaryLanguages = $glossaryItem->languages;
                                $itemName = array_column($glossaryLanguages, 'item_name', 'language_id')[$language->id];


                            @endphp
                            @endif
                            <label>{{$language->language}}</label>
                            <input type="text" name="item_name[]" class="form-control" required value="{{ old('item_name[]', isset($glossaryItem->id) ? $itemName : '') }}" class="form-control @error('item_name') is-invalid @enderror">
                                            @error('item_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                            <input type="hidden" name="language_id[]" value="{{ $language->id }}">
                        @endforeach
                    </div>

                        <button type="submit" class="btn btn-primary">{{isset($glossaryItem->id) ? 'Edit' : 'Add'}} Glossary</button>
                        <a href="{{route('glossary')}}" class="btn btn-secondary">Cancel</a>
                    </form>
            </div>
        </div>
    </div>
</section>
@endsection
