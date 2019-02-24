@extends('layouts.admin')

@section('admin_content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-11">

                <h1 class="mb-3">{{ $product->name }}</h1>
                {{--<small>Created by {{ $product->creator->name }} {{ $product->created_at->diffForHumans() }}</small>--}}

                <a class="btn btn-primary" href="{{ $product->path() }}/driver-kits/create">Add Driver Kit</a>
                <a class="btn btn-primary" href="{{ $product->path() }}/bios/create">Add Bios Version</a>

                <div class="card mt-3">

                    <div class="card-body">
                        <h2 class="card-title mb-0">Driver Kits</h2>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($product->driverKits as $driverKit)
                            <li class="list-group-item">
                                <div class="d-flex bd-highlight">
                                    {{-- Left Content --}}
                                    <div class="flex-grow-1 bd-highlight">
                                        {{ $driverKit->osVersion->name }} -
                                        <a target="_blank" href="{{ $driverKit->url }}">{{ $driverKit->filename() }}</a>
                                    </div>

                                    {{-- Right Content --}}
                                    <div class="bd-highlight">
                                        <small class="pr-5">Added {{ $driverKit->created_at->diffForHumans() }}</small>
                                        <a class="pr-1" title="Edit Driver" href="{{ $driverKit->path() }}/edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" title="Delete Driver"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h1 class="card-title mb-0">Bios Versions</h1>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($product->bioses as $bios)
                            <li class="list-group-item">
                                <div class="d-flex bd-highlight">
                                    {{-- Left Content --}}
                                    <div class="flex-grow-1 bd-highlight">
                                        <a target="_blank" href="{{ $bios->url }}">{{ $bios->version }}</a>
                                    </div>

                                    {{-- Right Content --}}
                                    <div class="bd-highlight">
                                        <small class="pr-5">Added {{ $bios->created_at->diffForHumans() }}</small>
                                        <a class="pr-1" title="Edit Bios" href="{{ $bios->path() }}/edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" title="Delete Bios"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{--<div class="card mt-3">--}}
                    {{--<div class="card-body">--}}

                        {{--<h2 class="card-title">Add Driver Kit</h2>--}}

                        {{--@include('shared.validation_errors')--}}
                        {{--<form method="POST" action="{{ $product->path() . '/driver-kits' }}">--}}
                            {{--@csrf--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="os-version">OS Version</label>--}}
                                {{--<select class="custom-select" id="os-version" name="os_version_id">--}}
                                    {{--@foreach($osVersions as $osVersion)--}}
                                        {{--<option value="{{$osVersion->id}}">{{$osVersion->name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="url">Download URL</label>--}}
                                {{--<input type="text" class="form-control" id="url" name="url" required>--}}
                            {{--</div>--}}

                            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}

                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="card mt-3">--}}
                    {{--<div class="card-body">--}}

                        {{--<h2 class="card-title">Add Bios</h2>--}}

                        {{--@include('shared.validation_errors')--}}
                        {{--<form method="POST" action="{{ $product->path() . '/bios' }}">--}}
                            {{--@csrf--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="version">Version</label>--}}
                                {{--<input type="text" class="form-control" id="version" name="version" required>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="url">Download URL</label>--}}
                                {{--<input type="text" class="form-control" id="url" name="url" required>--}}
                            {{--</div>--}}

                            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}

                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}


            </div>
        </div>
    </div>
@endsection
