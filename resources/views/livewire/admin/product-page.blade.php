{{-- <div>
    <div class="container my-5">
    <div style="background-color: #584d4d67; border: none;" class="card shadow-lg rounded">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-white">Manage Products</h2>

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="save">
                <div class="mb-3">
                    <label class="form-label text-white">Shirt Size</label>
                    <input type="text" wire:model.defer="size" class="form-control rounded-pill" placeholder="e.g., M, L, XL" required>
                    @error('size') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label text-white">Initial Stock</label>
                    <input type="number" wire:model.defer="stock" class="form-control rounded-pill" placeholder="Enter initial stock" min="1" required>
                    @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">Add Product</button>
                </div>
            </form>

            <hr class="my-4 text-white">

            <h4 class="mb-3 text-white">All Products</h4>
            <ul class="list-group">
                @foreach($products as $product)
                    <li class="list-group-item">
                        {{ $product->size }} — Stock: {{ $product->stock }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

</div> --}}
