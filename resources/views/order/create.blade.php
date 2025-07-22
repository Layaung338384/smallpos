@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg rounded" style="background-color: #584d4d67; border: none;">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center" style="color: #fff;">Place an Order</h2>



            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-6 mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="customer_name" class="form-control rounded-pill" placeholder="Enter your name" required>
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control rounded-pill" placeholder="Enter phone number" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control rounded-pill" placeholder="Enter address" required>
                </div>



                <div class="row">
                    <div class="col-6 mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control rounded-pill" placeholder="Quantity" min="1" required>
                </div>

                <div class="col-6 mb-3">
                    <label class="form-label">Amount Paid</label>
                    <input type="number" step="0.01" name="payment_amount" class="form-control rounded-pill" placeholder="Amount paid" required>
                </div>
                </div>

                <div class="row">
                    <div class="col-6 mb-3">
                    <label class="form-label">Shirt Size</label>
                    <select name="product_id" class="form-select rounded-pill" required>
                        <option value="">-- Select Shirt Size --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->size }} (Stock: {{ $product->stock }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 mb-4">
                    <label class="form-label">Admin Payment</label>
                    <select name="admin_payment_id" class="form-select rounded-pill" required>
                        <option value="">-- Select Admin Payment --</option>
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}">{{ $payment->name }} ({{ $payment->phone }})</option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-dark rounded-pill px-5">Submit Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
