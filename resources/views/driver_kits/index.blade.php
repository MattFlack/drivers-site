@extends('layouts.app')

@section('content')
    <div class="container ml-3 mr-3">
        @foreach($productCategories as $category)

            <h2>{{ str_plural($category->name) }}</h2>

            <table class="table table-striped mb-5">

                <thead>
                    <tr>
                        <th scope="col">{{ $category->name }}</th>
                        @foreach($osVersions as $osVersion)
                            <th scope="col">{{ $osVersion->name }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>

                    @foreach($category->products as $product)
                        <tr>
                            <th scope="row">{{ $product->name }}</th>

                            @foreach($osVersions as $osVersion)
                                @php $hasDriverKit = false @endphp

                                @foreach($product->driverKits as $driverKit)

                                    @if($driverKit->osVersion->id === $osVersion->id)
                                        <td>
                                            <a href="{{ $driverKit->url }}">
                                                {{ $driverKit->fileName() }}
                                            </a>

                                            @php $hasDriverKit = true @endphp
                                        </td>
                                    @endif

                                @endforeach

                                @if(!$hasDriverKit)
                                    <td>-</td>
                                @endif

                            @endforeach
                        </tr>
                    @endforeach

                </tbody>

            </table>
        @endforeach

    </div>
@endsection