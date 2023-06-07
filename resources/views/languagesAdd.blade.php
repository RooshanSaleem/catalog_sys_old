@extends('admin.layout.master')
@section('title', 'Add Language')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                        <h1 class="m-0">Add New Language</h1>
                </div>
            </div>
        </div>
</div>


    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-5 col-6">
                        <form method="POST" action="{{ route('languages.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="language">Language:</label>
                                <input type="text" name="language" id="language" class="form-control" required required class="form-control @error('language') is-invalid @enderror">
                                @error('language')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Language</button>
                            <a href="{{route('glossary')}}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection