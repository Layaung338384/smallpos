@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Dashboard</h1>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Admin Payment Accounts</div>
        <div class="card-body">
            <ul class="list-group">
                <h1> {{ $payments->count() }} Payment Found </h1>
                @forelse($payments as $payment)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $payment->name }}</span>
                        <span>${{ number_format($payment->total_received, 2) }}</span>
                    </li>
                @empty
                    <li class="list-group-item">No payment accounts found.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-success text-white">Products Stock</div>
        <div class="card-body">
            <ul class="list-group">
                @forelse($products as $product)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Size: {{ $product->size }}</span>
                        <span>Stock: {{ $product->stock }}</span>
                    </li>
                @empty
                    <li class="list-group-item">No products found.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-info text-white">Customer Orders</div>
        <div class="card-body">
            <h4>Total Orders: {{ $ordersCount }}</h4>
        </div>
    </div>
</div>
@endsection
