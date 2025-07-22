@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="mb-3">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card shadow p-4" style="background-color: #584d4d67; border: none;">
        <h2 class="mb-4">Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="size" class="form-label">Shirt Size</label>
                <input type="text" id="size" name="size" class="form-control" value="{{ old('size', $product->size) }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" min="0" required>
            </div>

            <button type="submit"  class="btn btn-dark">Update Product</button>

        </form>
    </div>
</div>
@endsection
