@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="mb-3">
        <a href="{{ route('payments.index') }}" class="btn btn-outline-secondary px-4">
                            Back
    </a>
    </div>

    <div class="card shadow-lg rounded"  style="background-color: #584d4d67; border: none;">
        <div class="card-body p-5">

            <h2 class="mb-4 text-center text-white">Edit Admin Payment</h2>

            <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-3">
                        <label for="name" class="form-label">Admin Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                               value="{{ old('name', $payment->name) }}" required placeholder="Enter admin name">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 offset-md-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" id="phone" name="phone" class="form-control"
                               value="{{ old('phone', $payment->phone) }}" required placeholder="Enter phone number">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark px-4">
                            Update Payment
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
