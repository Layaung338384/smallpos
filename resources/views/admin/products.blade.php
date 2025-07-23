@extends('layouts.app')

@section('content')
<div class="container my-5">

    {{-- 🟩 Form inside card --}}
    <div style="background-color: #584d4d67; border: none;" class="card shadow-lg rounded text-white mb-5">
        <div class="card-body p-5">
            <a href="{{ route('products.index') }}" class="text-white text-decoration-none">
                <h2 class="mb-4 text-center">Manage Products</h2>
            </a>

            @if(session('success'))
                <div class="alert alert-success text-dark">{{ session('success') }}</div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <label class="form-label">Shirt Size</label>
                        <input type="text" name="size" class="form-control @error('size')
                            is-invalid
                        @enderror rounded-pill" placeholder="e.g., M, L, XL" required>
                        @error('size')
                            <small class="text-danger invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 offset-md-3">
                        <label class="form-label">Initial Stock</label>
                        <input type="number" name="stock" class="form-control @error('stock')
                            is-invalid
                        @enderror rounded-pill" placeholder="Enter initial stock" min="1" required>
                        @error('stock')
                            <small class="text-danger invalid-feedback">{{ $message }}</small>
                        @enderror


                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-dark btn-lg rounded-pill px-5">
                        <i class="fas fa-plus-circle me-2"></i> Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- 🗂 Table outside card --}}
    <h4 class="mb-3">All Products</h4>
    <div class="table-responsive">
        <table class="table text-white table-bordered align-middle">
            <thead class="">
                <tr>
                    <th>Size</th>
                    <th>Stock</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm rounded-pill">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="">
            {{ $products->links() }}
        </div>
    </div>

</div>
@endsection

