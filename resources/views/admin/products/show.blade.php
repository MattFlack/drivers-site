@extends('layouts.admin')

@section('admin_content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-11">

                <h1 class="mb-3">{{ $product->name }}</h1>
                {{--<small>Created by {{ $product->creator->name }} {{ $product->created_at->diffForHumans() }}</small>--}}

                <a class="mr-1 btn btn-primary" href="{{ $product->path() }}/driver-kits/create">Add Driver Kit</a>
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

                                        <a title="Edit Driver" href="{{ $driverKit->path() }}/edit"><i class="fas fa-edit"></i></a>

                                        <button class="btn btn-link" title="Delete Product" data-toggle="modal" data-target="#confirmDelete">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <confirm-delete-modal
                                            title="Delete {{ $driverKit->filename() }}"
                                            message="Are you sure?"
                                            delete-url="{{ $driverKit->path() }}">
                                        </confirm-delete-modal>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h2 class="card-title mb-0">Bios Versions</h2>
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
            </div>
        </div>
    </div>
@endsection
