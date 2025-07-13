@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Cart 🛒</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count((array) session('cart')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price per kg</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $item)
                  @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp


                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>₹{{ $item['price'] }}</td>

                        <td>{{ $item['quantity'] }} kg</td>
                        <td>₹{{ $subtotal }}</td>
                        <td>
                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Total: ₹{{ $total }}</h4>

        <a href="{{ route('checkout.show') }}" class="btn btn-success mt-3">Proceed to Checkout</a>

    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
