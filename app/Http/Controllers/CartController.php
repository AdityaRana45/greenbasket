<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegetable;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $vegetable = Vegetable::findOrFail($id);

        if ($vegetable->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                "name" => $vegetable->name,
                "price" => $vegetable->price_per_kg,
                "image" => $vegetable->image,
                "quantity" => $request->quantity
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Added to cart!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed!');
    }
}

