@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">

            <div class="card">

                <div class="card-body">
                    <h1 class="card-title">Product Categories</h1>
                </div>

                <ul class="list-group list-group-flush">
                    @foreach($productCategories as $category)
                        <li class="list-group-item">
                            <div class="d-flex bd-highlight">

                                {{-- Left Content --}}
                                <div class="flex-grow-1 bd-highlight">
                                    {{ $category->name }}
                                </div>

                                {{-- Right Content --}}
                                <div class="bd-highlight">
                                    <a class="pr-1" title="Edit Category" href="{{ $category->path() }}/edit"><i class="fas fa-edit"></i></a>

                                    <button class="btn btn-link" title="Delete Category" data-toggle="modal" data-target="#confirmDeleteCategory{{ $category->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <confirm-delete-modal
                                            title="Delete {{ $category->name }}"
                                            message="Deleting this category will also delete all of the products belong to it. Are you sure?"
                                            delete-url="{{ $category->path() }}"
                                            data-target="confirmDeleteCategory{{ $category->id }}">
                                    </confirm-delete-modal>

                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="card-title">Add Product Category</h2>

                    @include('shared.validation_errors')
                    <form method="POST" action="/admin/product-categories">
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