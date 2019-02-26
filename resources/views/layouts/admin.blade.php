@extends('layouts.app')

@section('content')

    <div class="row ml-2">
        <div class="col-3">
            <nav class="nav flex-column nav-pills ml-3">
                <a class="nav-link {{ setActive('admin/products') }}" href="/admin/products">Products</a>
                {{--<a class="nav-link {{ setActive('admin/products/create') }}" href="/admin/products/create">Add Product</a>--}}
                <a class="nav-link {{ setActive('admin/product-categories') }}" href="/admin/product-categories">Product Categories</a>
                <a class="nav-link {{ setActive('admin/os-versions') }}" href="/admin/os-versions">OS Versions</a>
            </nav>
        </div>

        <div class="col-9">
            @yield('admin_content')
        </div>
    </div>


@endsection