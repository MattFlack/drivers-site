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
                    <product-search></product-search>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
