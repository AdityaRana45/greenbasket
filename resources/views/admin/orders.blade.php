@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📋 All Orders</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>#ID</th>
                <th>Customer</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Delivery</th> {{--  Red if Yes --}}
                <th>Items</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->address }}</td>
                <td>
                    @if(strtolower($order->home_delivery) === 'yes')
                        <span style="color: red; font-weight: bold;">Yes</span>
                    @else
                        No
                    @endif
                </td>
                <td>
                    <ul class="mb-0">
                        @foreach(json_decode($order->items, true) as $item)
                            <li>{{ $item['name'] }} ({{ $item['quantity'] }} kg) - ₹{{ $item['price'] }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
    <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-danger">Delete</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
    {{ $orders->links() }}
</div>

</div>
@endsection
