@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">

            <div class="card">

                <div class="card-body">
                    <h1 class="card-title">OS Versions</h1>
                </div>

                <ul class="list-group list-group-flush">
                    @foreach($osVersions as $osVersion)
                        <li class="list-group-item">
                            <div class="d-flex bd-highlight">

                                {{-- Left Content --}}
                                <div class="flex-grow-1 bd-highlight">
                                    {{ $osVersion->name }}
                                </div>

                                {{-- Right Content --}}
                                <div class="bd-highlight">
                                    <a class="pr-1" title="Edit OS Version" href="{{ $osVersion->path() }}/edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" title="Delete OS Version"><i class="fas fa-trash"></i></a>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="card-title">Add OS Version</h2>
                    @include('shared.validation_errors')

                    <form method="POST" action="/admin/os-versions">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection