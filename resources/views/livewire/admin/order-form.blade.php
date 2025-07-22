{{-- <div>
    <div class="container my-5">
    <div class="card shadow-lg rounded" style="background-color: #584d4d67; border: none;">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center" style="color: #fff;">Place an Order</h2>

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" wire:model="customer_name" class="form-control rounded-pill" required>
                        @error('customer_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" wire:model="phone" class="form-control rounded-pill" required>
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" wire:model="address" class="form-control rounded-pill" required>
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Shirt Size</label>
                    <select wire:model="product_id" class="form-select rounded-pill" required>
                        <option value="">-- Select Shirt Size --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->size }} (Stock: {{ $product->stock }})</option>
                        @endforeach
                    </select>
                    @error('product_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" wire:model="quantity" class="form-control rounded-pill" min="1" required>
                    @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount Paid</label>
                    <input type="number" step="0.01" wire:model="payment_amount" class="form-control rounded-pill" required>
                    @error('payment_amount') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Admin Payment</label>
                    <select wire:model="admin_payment_id" class="form-select rounded-pill" required>
                        <option value="">-- Select Admin Payment --</option>
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }} ({{ $payment->phone }})</option>
                        @endforeach
                    </select>
                    @error('admin_payment_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-primary rounded-pill px-5">Submit Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div> --}}
