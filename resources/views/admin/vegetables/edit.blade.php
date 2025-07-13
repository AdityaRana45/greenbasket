@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Vegetable</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vegetables.update', $vegetable->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $vegetable->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Price per kg (₹)</label>
            <input type="number" name="price_per_kg" value="{{ $vegetable->price_per_kg }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock (kg)</label>
            <input type="number" name="stock" value="{{ $vegetable->stock }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image (leave blank to keep old)</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('uploads/' . $vegetable->image) }}" width="100" class="mt-2">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $vegetable->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update Vegetable</button>
    </form>

    <!-- Delete Section in Table Box -->
    <div class="card mt-4">
        <div class="card-header bg-danger text-white">
            Danger Zone – Delete Vegetable
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Vegetable:</td>
                    <td>{{ $vegetable->name }}</td>
                </tr>
                <tr>
                    <td>Current Stock:</td>
                    <td>{{ $vegetable->stock }} kg</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <form action="{{ route('vegetables.destroy', $vegetable->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vegetable?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100">Delete This Vegetable</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
