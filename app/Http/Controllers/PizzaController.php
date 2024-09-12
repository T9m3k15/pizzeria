<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        // Przykładowe dane pizzy: nazwa, cena i obraz
        $pizzas = [
            ['name' => 'Margherita', 'price' => 20, 'image' => 'margherita.jpg'],
            ['name' => 'Pepperoni', 'price' => 25, 'image' => 'pepperoni.jpg'],
            ['name' => 'Hawaiian', 'price' => 23, 'image' => 'hawaiian.jpg'],
            ['name' => 'Vegetarian', 'price' => 22, 'image' => 'vegetarian.jpg'],
            ['name' => 'BBQ Chicken', 'price' => 27, 'image' => 'bbq-chicken.jpg'],
        ];


        $addons = [
            ['name' => 'Sos Pomidorowy', 'price' => 3, 'image' => 'sos_pomidorowy.jpg'],
            ['name' => 'Sos Czosnkowy', 'price' => 3, 'image' => 'sos_czosnkowy.jpg'],
            ['name' => 'Coca-Cola', 'price' => 5, 'image' => 'cola.jpg'],
            ['name' => 'Sprite', 'price' => 5, 'image' => 'sprite.jpg'],
            // inne dodatki
        ];

        return view('pizzas', ['pizzas' => $pizzas, 'addons' => $addons]);
    }

    public function order(Request $request)
    {
        $pizza = $request->input('pizza');
        $price = $request->input('price');

        return response()->json(['pizza' => $pizza, 'price' => $price]);
    }

    
}
