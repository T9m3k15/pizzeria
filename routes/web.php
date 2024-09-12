<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PizzaController;

Route::get('/', [PizzaController::class, 'index']);
Route::post('/order-pizza', [PizzaController::class, 'order'])->name('pizza.order');
Route::get('/order', function () {
    return view('order');
});
Route::get('/order', function () {
    return view('order');
});

Route::post('/submit-order', [OrderController::class, 'submitOrder']);
