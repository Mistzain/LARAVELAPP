@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-header">Product ID: {{$product->id}}</div>
                <div class="card-body">
                    <form action="/product/update/{{$product->id}}" method="POST">
                        @csrf
                        <h1> </h1>
                        <h1> </h1><button type="submit" class="btn btn-primary">Save</button>
                        <a href="/product">Product</a>
                        <h1> </h1>
                        <textarea name="name" type="text" class="form-control" id="inputName" rows="1"
                            required>{{$product->name}}</textarea>
                        @if ($errors->has('name'))
                        <span class="text-danger font-bold">{{ $errors->first('name') }}</span>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="PUT">

                        <div class="col-12 pb-2">
                            <label for="inputDescription" class="form-label">Description:</label>
                            <textarea name="description" type="description" class="form-control" id="inputDescription"
                                rows="5">{{$product->description}}</textarea>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputCategory" class="form-label">Category:</label>
                            <textarea name="category" type="category" class="form-control" id="inputCategory"
                                rows="5">{{$product->category}}</textarea>
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputBranch" class="form-label">Branch:</label>
                            <input name="branch" type="branch" class="form-control" id="inputBranch"
                                value={{$product->branch}}>
                        </div>
                        <div class="col-6 pb-2">
                            <label for="inputPrice" class="form-label">Price (PHP):</label>
                            <input name="price" type="price" class="form-control" id="inputPrice"
                                value={{$product->price}}>
                        </div>
                        <div class="col-6 pb-4">
                            <label for="inputUnit" class="form-label">Unit:</label>
                            <input name="unit" type="unit" class="form-control" id="inputUnit" value={{$product->unit}}>
                        </div>
                        <div class="col-12">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection