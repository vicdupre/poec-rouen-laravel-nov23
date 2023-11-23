<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recette;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RecetteController extends Controller
{
    public function index()
    {
        //Afficher une vue avec tous les ingrédients

        $recettes = Recette::with(["category", "ingredients"])->get();

        return view("recettes.index", ["recettes" => $recettes]);
    }

    public function create()
    {
        //Afficher une vue avec un formulaire d'ajout

        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view(
            "recettes.create",
            [
                "categories" => $categories,
                "ingredients" => $ingredients
            ]
        );
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
                "difficulty" => ["required", "integer", "numeric", "min:0", "max:4"],
                "time_to_prepare" => ["required",  "integer", "numeric", "min:1"],
                "category_id" => ["required", "exists:categories,id"],
                "ingredients" => ["required", "array"]
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
                "difficulty" => "La difficulté",
                "time_to_prepare" => "Le temps de préparation",
            ]
        );

        if ($validator->fails()) {
            Log::debug($validator->errors());

            return redirect()->back()->withErrors($validator->errors());
        }

        $data = $validator->validated();
        Log::debug($request->all());
        Log::debug($data);
        $recette = Recette::create($data);
        $recette->ingredients()->attach($data['ingredients']);
        return redirect()->route("recettes");
    }

    public function destroy($id)
    {
        Recette::destroy($id);
        return redirect()->route("recettes");
    }
}
