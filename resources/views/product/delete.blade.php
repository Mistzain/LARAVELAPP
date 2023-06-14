@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($products) && count($products) > 0)
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td><a href="/product/show/{{$product->id}}">{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>Php {{ $product->price }}</td>
                            </tr>
                            @endforeach
                            @else
                            No Results found.
                            @endif
                        </tbody>
                    </table>
                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection