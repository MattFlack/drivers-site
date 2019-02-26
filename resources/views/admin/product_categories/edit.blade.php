@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">

            <h2>{{ $productCategory->name }}</h2>

            @include('shared.validation_errors')
            <form method="POST" action="{{ $productCategory->path() }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $productCategory->name }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>
@endsection