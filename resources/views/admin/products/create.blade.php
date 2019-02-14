@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Add Product</h1>
                    @include('shared.validation_errors')

                    <form method="POST" action="/admin/products">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="custom-select" id="category" name="product_category_id">
                                @foreach($productCategories as $productCategory)
                                    <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection