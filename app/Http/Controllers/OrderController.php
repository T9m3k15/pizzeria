<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        // Walidacja danych
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'payment' => 'required|string|in:cash,card',
        ]);
    
        // Oblicz całkowity koszt (można to zrobić na podstawie danych zamówienia)
        $totalPrice = 100.00; // Zamień to na faktyczną cenę z zamówienia
    
        // Możesz przekazać dane zamówienia i cenę do widoku potwierdzenia
        return view('order-confirmation', ['order' => $validated, 'totalPrice' => $totalPrice]);
    }
    
}
