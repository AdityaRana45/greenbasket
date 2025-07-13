@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Vegetable 🥦</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vegetables.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price per kg (₹)</label>
            <input type="number" name="price_per_kg" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock (kg)</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <button class="btn btn-success">Add Vegetable</button>
    </form>
</div>
@endsection
