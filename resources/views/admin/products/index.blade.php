@extends('layouts.admin')

@section('admin_content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex bd-highlight">

                        {{-- Left Content --}}
                        <div class="flex-grow-1 bd-highlight">
                            <h2 class="card-title m-0">Products</h2>
                        </div>

                        {{-- Right Content --}}
                        <div class="bd-highlight">
                            <a class="btn btn-primary" href="/admin/products/create">Add Product</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Creator</th>
                            <th scope="col">Added</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{{ $product->path() }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->creator->name }}</td>
                                    <td>{{ $product->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a title="Edit Product" href="{{ $product->path() }}/edit"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-link" title="Delete Product" data-toggle="modal" data-target="#confirmDeleteProduct{{ $product->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <confirm-delete-modal
                                            title="Delete {{ $product->name }}"
                                            message="Deleting this product will also delete all of its drivers and bioses. Are you sure?"
                                            delete-url="{{ $product->path() }}"
                                            data-target="confirmDeleteProduct{{ $product->id }}">
                                        </confirm-delete-modal>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
