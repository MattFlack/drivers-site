@extends('layouts.admin')

@section('admin_content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">

                    <div class="card-body">
                        <h1 class="card-title mb-0">{{ $product->name }}</h1>
                        {{--<small>Created by {{ $product->creator->name }} {{ $product->created_at->diffForHumans() }}</small>--}}
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($product->driverKits as $driverKit)
                            <li class="list-group-item">
                                {{ $driverKit->osVersion->name }} -
                                <a href="{{ $driverKit->url }}" target="_blank">
                                    {{ $driverKit->fileName() }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="card mt-3">
                    <div class="card-body">

                        <h2 class="card-title">Add Driver Kit</h2>

                        @include('shared.validation_errors')
                        <form method="POST" action="{{ $product->path() . '/driver-kits' }}">
                            @csrf

                            <div class="form-group">
                                <label for="os-version">OS Version</label>
                                <select class="custom-select" id="os-version" name="os_version_id">
                                    @foreach($osVersions as $osVersion)
                                        <option value="{{$osVersion->id}}">{{$osVersion->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="url">Download URL</label>
                                <input type="text" class="form-control" id="url" name="url" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>

            </div>
        </div>
    </div>
@endsection
