<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'home_delivery' => 'required|in:Yes,No',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        Order::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'home_delivery' => $request->home_delivery,
            'items' => json_encode($cart),
        ]);

        session()->forget('cart');
         return redirect('/')->with('success', 'Order placed successfully!');

    }
}
