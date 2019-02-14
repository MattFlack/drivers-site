@extends('layouts.app')

@section('content')

    <div class="row ml-2">
        <div class="col-3">
            <nav class="nav flex-column nav-pills ml-3">
                <a class="nav-link {{ setActive('admin') }}" href="/admin">Admin Home</a>
                <a class="nav-link {{ setActive('admin/products/create') }}" href="/admin/products/create">Add Product</a>
                <a class="nav-link {{ setActive('admin/product-categories/create') }}" href="/admin/product-categories/create">Add Product Category</a>
                <a class="nav-link {{ setActive('admin/os-versions/create') }}" href="/admin/os-versions/create">Add OS Version</a>
            </nav>
        </div>

        <div class="col-9">
            @yield('admin_content')
        </div>
    </div>


@endsection