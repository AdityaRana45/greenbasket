@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Checkout</h2>

    <form action="{{ route('checkout.place') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" required class="form-control" style="width: 100%;">
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile</label>
                <input type="text" name="mobile" required class="form-control" style="width: 100%;">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" required style="width: 100%;"></textarea>
        </div>
        <div class="mb-4">
            <label for="home_delivery" class="form-label fw-semibold">Do you want Home Delivery?</label>
            <select name="home_delivery" id="home_delivery" class="form-select" style="height: 50px; width: 100%;" required>
                <option value="">-- Select Option --</option>
                <option value="Yes">Yes, I want home delivery</option>
                <option value="No">No, I will pick up from the store</option>
            </select>
            <small class="text-muted">
                If you select <strong>No</strong>, you’ll need to collect your order yourself.
            </small>
        </div>
        <button class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection