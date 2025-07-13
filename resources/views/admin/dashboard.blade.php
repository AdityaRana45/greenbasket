@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🛠️ Admin Dashboard</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Orders -->
        <div class="col-md-4 mb-4">
            <div class="card border-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">📦 View Orders</h5>
                    <p class="card-text">Check all customer orders placed on GreenBasket.</p>
                    <a href="{{ route('admin.orders') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>

        <!-- Add Vegetable -->
        <div class="col-md-4 mb-4">
            <div class="card border-success h-100">
                <div class="card-body">
                    <h5 class="card-title">🥬 Add Vegetable</h5>
                    <p class="card-text">Add new vegetables to your GreenBasket store.</p>
                    <a href="{{ route('vegetables.create') }}" class="btn btn-success">Add Vegetable</a>
                </div>
            </div>
        </div>

        <!-- All Vegetables -->
        <div class="col-md-4 mb-4">
            <div class="card border-info h-100">
                <div class="card-body">
                    <h5 class="card-title">🥕 View All Vegetables</h5>
                    <p class="card-text">Edit or delete available vegetables.</p>
                    <a href="{{ route('vegetables.index') }}" class="btn btn-info">Manage Vegetables</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
