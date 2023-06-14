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
                <div class="card-header">Create New Product</div>
                <div class="card-body">
                    {{-- <form action="{{ route('update.product', ['id' => $product->id]) }}" method="post"> --}}
                    <form action="/product/store" method="POST">
                        @csrf
                        <div class="col-12 pb-2">
                            <label for="inputName" class="form-label">Product Name:</label>
                            <textarea name="name" type="text" class="form-control" id="inputName" rows="1"
                                placeholder="Product Name " required></textarea>
                            @if ($errors->has('name'))
                            <span class="text-danger font-bold">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputDescription" class="form-label">Description:</label>
                            <textarea name="description" type="text" class="form-control" id="inputDescription" rows="5"
                                required></textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger font-bold">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputCategory" class="form-label">Category:</label>
                            <textarea name="category" type="text" class="form-control" id="inputCategory" rows="5"
                                required></textarea>
                            @if ($errors->has('category'))
                            <span class="text-danger font-bold">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                        <div class="col-12 pb-2">
                            <label for="inputBranch" class="form-label">Branch:</label>
                            <input name="branch" type="text" class="form-control" id="inputBranch" required>
                            @if ($errors->has('branch'))
                            <span class="text-danger font-bold">{{ $errors->first('branch') }}</span>
                            @endif
                        </div>
                        <div class="col-6 pb-2">
                            <label for="inputPrice" class="form-label">Price (PHP):</label>
                            <input name="price" type="text" class="form-control" id="inputPrice" required>
                            @if ($errors->has('price'))
                            <span class="text-danger font-bold">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="col-6 pb-4">
                            <label for="inputUnit" class="form-label">Unit:</label>
                            <input name="unit" type="text" class="form-control" id="inputUnit" required>
                            @if ($errors->has('unit'))
                            <span class="text-danger font-bold">{{ $errors->first('unit') }}</span>
                            @endif
                        </div>
                        <div class="row pl-3 clearfix">
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/product">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection