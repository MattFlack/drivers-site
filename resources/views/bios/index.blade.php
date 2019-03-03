@extends('layouts.app')

@section('content')
    <div class="container ml-3 mr-3">
        @foreach($productCategories as $category)

            <h2>{{ str_plural($category->name) }}</h2>

            <table class="table table-bordered mb-5">

                <thead>
                    <tr>
                        <th scope="col">{{ $category->name }}</th>
                        <th scope="col">Bios</th>
                        <th scope="col">Added</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($category->products as $product)
                    <tr>
                        <th scope="row" rowspan="{{ $product->bioses->count() }}">{{ $product->name }}</th>

                        <?php $count = 0 ?>
                        @foreach($product->bioses as $bios)
                            @if($count !== 0)
                                <tr>
                                    <?php ++$count ?>
                            @endif
                            <td>
                                <a target="_blank" href="{{ $bios->url }}">{{ $bios->version }}</a>
                            </td>
                            <td>{{ $bios->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach


                @endforeach

                </tbody>

            </table>
        @endforeach

    </div>
@endsection