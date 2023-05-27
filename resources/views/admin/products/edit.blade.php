@extends('admin.dashboard')

@section('dashboardContnet')
    <h3 class="text-primary p-4 fs-1 fw-bold">Edit - {{ $product->name }}</h3>
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-4" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <input type="text" class="form-control" id="desc" name="description"
                value="{{ $product->description }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
        </div>

        <div class="mb-3">
            <label for="sale" class="form-label">Sale</label>
            <input type="number" class="form-control" id="sale" name="sale" value="{{ $product->sale }}">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
        </div>

        <div class="mb-3">
            <label for="cat_id" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="cat_id" id="cat_id">
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}" {{ $product->id === $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <img width="150px" height="150px" src="/uploads/products/{{ $product->image }}" />

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
