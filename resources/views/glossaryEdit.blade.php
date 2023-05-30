@extends('admin.layout.master')
@section('title', isset($glossaryItem) ? 'Edit Glossary' : 'Add Glossary')
@section('content')
    <div class="container">
        <h1>Edit Glossary</h1>
        <form action="{{ route('glossary.update', $glossaryItem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="item_id">Item ID:</label>
                <input type="text" id="item_id" name="item_id" value="{{ $glossaryItem->item_id }}" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="language_id">Language:</label>
                <select name="language_id" id="language_id" class="form-control">
                    @foreach ($languages as $language)
                        <option value="{{ $language->id }}" {{ $glossaryItem->language_id === $language->id ? 'selected' : '' }}>
                            {{ $language->language }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" id="item_name" name="item_name" value="{{ $glossaryItem->item_name }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
