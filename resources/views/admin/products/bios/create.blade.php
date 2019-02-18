@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">

            <div class="card">
                <div class="card-body">

                    <h2 class="card-title">Add Bios</h2>

                    @include('shared.validation_errors')
                    <form method="POST" action="{{ $product->path() . '/bios' }}">
                        @csrf

                        <div class="form-group">
                            <label for="version">Version</label>
                            <input type="text" class="form-control" id="version" name="version" required>
                        </div>

                        <div class="form-group">
                            <label for="url">Download URL</label>
                            <input type="text" class="form-control" id="url" name="url" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h1 class="card-title">Bios Versions</h1>
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
                                    <small>Added {{ $bios->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection