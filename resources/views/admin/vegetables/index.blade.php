@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Vegetables 🥦</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('vegetables.create') }}" class="btn btn-success mb-3">+ Add New Vegetable</a>

    <div class="row">
        @forelse($vegetables as $veg)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('uploads/' . $veg->image) }}" class="card-img-top" height="200" style="object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $veg->name }}</h5>
                    <p class="card-text">₹{{ $veg->price_per_kg }} / kg</p>
                    <p class="card-text">{{ $veg->description }}</p>
                    <span class="badge bg-{{ $veg->stock > 0 ? 'success' : 'danger' }}">
                        {{ $veg->stock > 0 ? 'Stock: ' . $veg->stock . ' kg' : 'Out of Stock' }}
                    </span>

                    <div class="mt-3 d-flex justify-content-between">
                        <a href="{{ route('vegetables.edit', $veg->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('vegetables.destroy', $veg->id) }}" method="POST" onsubmit="return confirm('Delete this vegetable?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>No vegetables found.</p>
        @endforelse
    </div>
</div>
@endsection
