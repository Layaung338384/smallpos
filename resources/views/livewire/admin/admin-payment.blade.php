{{-- <div>
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div style="background-color: #584d4d67; border: none;" class="card shadow-lg rounded">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center">
                <a href="{{ route('payments.index') }}" style="color: #fff;"  class="text-decoration-none">Admin Payments</a>
            </h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('payments.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Admin Name</label>
                    <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter admin name" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control rounded-pill" placeholder="Enter phone number" required>
                </div>
                <div class="text-center">
                    <button class="btn btn-success btn-lg rounded-pill px-4">Add Admin</button>
                </div>
            </form>

            <hr class="my-4">

            <h4 class="mb-3">All Admin Payments</h4>
            <ul class="list-group">
                @foreach($payments as $payment)
                    <li class="list-group-item">
                        {{ $payment->name }} ({{ $payment->phone }}) — Total Received: ${{ $payment->total_received }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection


</div> --}}
