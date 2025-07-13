<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function orderList()
{
    $orders = Order::latest()->paginate(10);

    return view('admin.orders', compact('orders'));
}

public function dashboard()
{
    return view('admin.dashboard');
}
public function delete($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->back()->with('success', 'Order deleted successfully!');
}


}
