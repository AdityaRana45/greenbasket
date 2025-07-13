@extends('layouts.app')

@section('content')
@if(session('success'))
   
@endif

<div class="container">
   <h2 class="mb-4">Welcome to GreenBasket 🧺🥦🍎</h2>


<div class="mb-4 p-3 bg-light rounded shadow-sm text-center">
    <h5 class="text-success mb-2">🚚 Safe & Timely Delivery</h5>
    <p class="mb-1">Get your veggies <strong>within 2 hours</strong> of ordering</p>
    <p class="mb-1">Delivery available within a <strong>5 KM radius</strong></p>
    <p class="mb-1 text-danger"><strong>Note:</strong> Delivery charges range from <strong>₹50 to ₹150</strong> depending on your location.</p>
    <p class="mb-0 text-muted">Fresh · Organic · Handpicked 🍅🥬</p>
</div>



<div class="row row-cols-2 row-cols-md-3 g-4">

    @foreach($vegetables as $veg)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('uploads/' . $veg->image) }}" class="card-img-top" height="200" style="object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $veg->name }}</h5>
                    <p class="card-text">₹{{ $veg->price_per_kg }} / kg</p>
                    <p class="card-text">{{ $veg->description }}</p>

                    @if($veg->stock > 0)
                        <span class="badge bg-success mb-2">In Stock: {{ $veg->stock }} kg</span><br>
                        <form action="{{ route('add.to.cart', $veg->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" value="1" min="1" max="{{ $veg->stock }}" class="form-control mb-2" style="width: 70px; display:inline-block;">
                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                        </form>
                    @else
                        <span class="badge bg-danger">Out of Stock</span>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
