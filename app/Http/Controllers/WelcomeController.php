<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $cars = collect([
            [
                "car_name" => "Tesla Model S",
                "price" => 79999,
                "discount" => 5000,
                "hand" => 4,
                "availability" => "In Stock",
                "color" => "Red"
            ],
            [
                "car_name" => "Toyota Prius",
                "price" => 24999,
                "discount" => 2000,
                "hand" => 2,
                "availability" => "Out of Stock",
                "color" => "Blue"
            ],
            [
                "car_name" => "Ford Mustang",
                "price" => 55999,
                "hand" => 3,
                "discount" => 3000,
                "availability" => "In Stock",
                "color" => "Black"
            ],
            [
                "car_name" => "Audi A4",
                "price" => 39999,
                "discount" => 4500,
                "hand" => 1,
                "availability" => "In Stock",
                "color" => "White"
            ],
            [
                "car_name" => "BMW 3 Series",
                "price" => 41999,
                "hand" => 1,
                "discount" => 4000,
                "availability" => "Out of Stock",
                "color" => "Silver"
            ]
        ]);

        $price_sort = $request->get('price_sort');
        if ($price_sort) {
            $cars = $price_sort == 'desc'
                ? $cars->sortByDesc('price')
                : $cars->sortBy('price');
        }

        return view('welcome', [
            'cars' => $cars,
            'price_sort' => $price_sort,
        ]);
    }
}
