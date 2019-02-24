@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">
            <h2>{{ $driverKit->product->name }} - {{ $driverKit->osVersion->name }}</h2>

            @include('shared.validation_errors')
            <form method="POST" action="{{ $driverKit->path() }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="url">Download URL</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ $driverKit->url }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection