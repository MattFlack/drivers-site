@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-md-12 mr-4">
            @include('shared.validation_errors')
            <h2>{{ $product->name }}</h2>
            <form method="POST" action="{{ $product->path() }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="custom-select" id="category" name="product_category_id">
                        @foreach($productCategories as $productCategory)
                            <option value="{{ $productCategory->id }}"
                                @if($productCategory->id === $product->product_category_id)
                                    selected="selected"
                                @endif>
                                {{ $productCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection