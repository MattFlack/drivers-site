@extends('layouts.admin')

@section('admin_content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title m-0">Products</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Creator</th>
                            <th scope="col">Added</th>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{{ $product->path() }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->creator->name }}</td>
                                    <td>{{ $product->created_at->diffForHumans() }}</td>
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
