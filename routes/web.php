<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\VegetableController;


Auth::routes(['register' => false]);



Route::get('/search', [HomepageController::class, 'search'])->name('search');



Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // ✅ Add this line

    Route::get('/orders', [AdminController::class, 'orderList'])->name('admin.orders');
    // web.php
Route::delete('/admin/orders/{id}', [AdminController::class, 'delete'])->name('admin.orders.delete');

    Route::resource('vegetables', VegetableController::class);
});


Route::get('/', [HomepageController::class, 'index']);

Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');



Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');

Route::view('/about', 'about')->name('about');
Route::get('/contact', function () {
    return view('contact');
});

