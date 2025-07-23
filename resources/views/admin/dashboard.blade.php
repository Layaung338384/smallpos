@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-5 fw-bold text-primary">📊 Admin Dashboard</h1>

    {{-- Admin Payment Accounts --}}
    <div class="card shadow-sm mb-4" style="background: #503C3C">
        <div class="card-header bg-dark text-white fw-semibold">
            💰 Admin Payment Accounts
        </div>
        <div class="card-body text-white ">
            <h5 class="mb-3 text-muted">{{ $payments->count() }} Payments Found</h5>
            <ul class="list-group  list-group-flush">
                @forelse($payments as $payment)
                    <li style="background: #584d4d67" class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-medium">{{ $payment->name }}</span>
                        <span class="badge bg-dark fs-6">${{ number_format($payment->total_received, 2) }}</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No payment accounts found.</li>
                @endforelse
            </ul>
            <div class="mt-2">
                {{ $payments->links() }}
            </div>
        </div>
    </div>

    {{-- Product Stock --}}
    <div class="card shadow-sm mb-4" style="background: #503C3C">
        <div class="card-header bg-dark text-white fw-semibold">
            🛒 Product Stock
        </div>
        <div class="card-body text-white ">
            <ul class="list-group  list-group-flush">
                @forelse($products as $product)
                    <li style="background: #584d4d67" class="list-group-item  d-flex justify-content-between align-items-center">
                        <span>Size: <strong>{{ $product->size }}</strong></span>
                        <span class="badge text-white bg-secondary">{{ $product->stock }}</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No products found.</li>
                @endforelse
            </ul>
            <div class="mt-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    {{-- Customer Orders --}}
    <div class="card shadow-sm" style="background: #503C3C">
        <div class="card-header bg-dark text-white fw-semibold">
            📦 Customer Orders
        </div>
        <div class="card-body text-white">
            <h5 class="text-white">Total Orders: <span class="badge bg-dark">{{ $ordersCount }}</span></h5>
        </div>
    </div>
</div>
@endsection
