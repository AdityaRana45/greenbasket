@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">About GreenBasket 🧺</h2>

    <div class="bg-light p-4 rounded shadow-sm">
        <p class="fs-5">
            <strong>GreenBasket</strong> is your one-stop destination for <span class="text-success">fresh, organic, and handpicked vegetables</span>,
            delivered straight to your doorstep. We are passionate about healthy living and strive to bring the farm to your table with utmost quality and care.
        </p>

        <hr>

        <h5 class="text-success mt-4">🌱 What Makes Us Special?</h5>
        <ul class="list-unstyled ps-3">
            <li>🥬 <strong>Farm-Fresh Quality:</strong> We source vegetables directly from trusted local farmers.</li>
            <li>🚚 <strong>Fast Delivery:</strong> Get your order delivered within <strong>2 hours</strong> (within 5 KM).</li>
            <li>💰 <strong>Affordable Prices:</strong> Best prices without compromising on quality.</li>
            <li>📦 <strong>Secure Packaging:</strong> Hygienically packed and handled with care.</li>
        </ul>

        <hr>

        <h5 class="text-success mt-4">📌 Delivery Charges & Conditions</h5>
        <ul class="text-muted small ps-3">
            <li>• <strong>0 – 2 KM:</strong> ₹50</li>
            <li>• <strong>2 – 3 KM:</strong> ₹75</li>
            <li>• <strong>3 – 4 KM:</strong> ₹100</li>
            <li>• <strong>4 – 5 KM:</strong> ₹150</li>
            <li>• <strong>Note:</strong> If your order weighs more than <strong>10 KG</strong>, additional charges may apply.</li>
        </ul>

        <h5 class="text-success mt-4">⚠️ Order Policy</h5>
        <ul class="text-muted small ps-3">
            <li>• Fake or non-serious orders will be rejected and blacklisted.</li>
            <li>• Orders cannot be canceled once dispatched.</li>
            <li>• Please keep your phone available for order confirmation.</li>
        </ul>

        <hr>

        <p class="text-secondary mt-4" style="font-size: 14px;">
            Thank you for choosing <strong>GreenBasket</strong> – where health, freshness, and service go hand-in-hand. 💚
        </p>
    </div>
</div>
@endsection
