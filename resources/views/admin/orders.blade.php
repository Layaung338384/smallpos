@extends('layouts.app')

@section('content')
<div class="container text-white">
    <h2 class="mt-5">All Orders</h2>

    <div class="mb-3">
    <a href="{{ route('orders.downloadPdf') }}" class="btn btn-dark">
        <i class="fas fa-file-pdf"></i> Download Orders as PDF
    </a>
</div>


    <table class="table text-white table-bordered table-striped">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Size</th>
                <th>Qty</th>
                <th>Paid</th>
                <th>Admin Payment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->product->size }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ $order->payment_amount }}</td>
                    <td>{{ $order->adminPayment->name }}</td>
                    <td>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure to cancel this order?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">No orders yet.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="">
        {{ $orders->links() }}
    </div>
</div>
@endsection
