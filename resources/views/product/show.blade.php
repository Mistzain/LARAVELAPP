@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Product ID: {{$product->id}}</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 pb-2">
                            <label for="inputName" class="form-label">Product Name:</label>
                            <p class="form-control">{{$product->name}}</p>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputDescription" class="form-label">Description:</label>
                            <textarea type="description" class="form-control" id="inputDescription" disabled="true"
                                rows="5">{{$product->description}}</textarea>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputCategory" class="form-label">Category:</label>
                            <textarea type="category" class="form-control" id="inputCategory" disabled="true"
                                rows="5">{{$product->category}}</textarea>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputBranch" class="form-label">Branch:</label>
                            <input type="branch" class="form-control" id="inputBranch" placeholder={{$product->branch}}
                                disabled="true">
                        </div>
                        <div class="col-6 pb-2">
                            <label for="inputPrice" class="form-label">Price:</label>
                            <input type="price" class="form-control" id="inputPrice"
                                placeholder="Php {{$product->price}}" disabled="true">
                        </div>
                        <div class="col-6 pb-4">
                            <label for="inputUnit" class="form-label">Unit:</label>
                            <input type="unit" class="form-control" id="inputUnit" placeholder={{$product->unit}}
                                disabled="true">
                        </div>
                        <div class="col-12">
                            <a href="/product/edit/{{$product->id}}" class="btn btn-primary">Edit</a>
                            <a href="/product/destroy/{{$product->id}}" class="btn btn-primary">Delete</a>
                            <a href="/product">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection