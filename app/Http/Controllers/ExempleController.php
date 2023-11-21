<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExempleController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function products()
    {
        $products = ["Télé", "Vélo", "Canapé"];

        return view(
            'products',
            [
                "name" => "Produits",
                "users" => [],
                "products" => $products
            ]
        );
    }
}
