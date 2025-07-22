{{--

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
 --}}

 {{-- crud edition --}}

@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-white">Admin Payments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div style="background-color: #584d4d67; border: none;" class="card shadow-lg rounded mb-5">
    <div class="card-body p-5">
        <form action="{{ route('payments.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Admin Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter admin name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-dark px-4">
                    <i class="fas fa-cash-register me-2"></i> Add Admin Payment
                </button>
            </div>
        </form>
    </div>
</div>




    <table class="table table-bordered text-white">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Total Received</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->name }}</td>
                <td>{{ $payment->phone }}</td>
                <td>{{ $payment->total_received }}</td>
                <td>
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary rounded-pill btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="{{ route('payments.destroy', $payment->id) }}" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Delete this payment?')"> <i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="">
        {{ $payments->links() }}
    </div>
</div>
@endsection


