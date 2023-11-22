<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class IngredientController extends Controller
{
    public function index()
    {
        //Afficher une vue avec tous les ingrédients

        $ingredients = Ingredient::all();

        return view("ingredients.index", ["ingredients" => $ingredients]);
    }

    public function create()
    {
        //Afficher une vue avec un formulaire d'ajout
        return view("ingredients.create");
    }

    public function store(Request $request)
    {
        //Enregister un ingrédient en base de données

        $validator = Validator::make(
            //La donnée à valider
            $request->all(),
            //Les règles de validation
            [
                "name" => ["required", "string", "min:2"],
            ],
            //Messages d'erreur personnalisés par règle
            [
                "required" => ":attribute est obligatoire",
                "string" => ":attribute doit être une chaîne de caractères",
                "min" => ":attribute doit faire au moins 2 caractères"
            ],
            //Noms d'attributs personnalisés pour les messages d'erreur
            [
                "name" => "Le nom",
            ]
        );

        if ($validator->fails()) {
            Log::debug($validator->errors());

            return redirect()->back()->withErrors($validator->errors());
        }

        $data = $validator->validated();
        Log::debug($request->all());
        Log::debug($data);
        Ingredient::create($data);
        return redirect()->route("ingredients");
    }

    public function destroy($id)
    {
        Ingredient::destroy($id);
        return redirect()->route("ingredients");
    }
}
