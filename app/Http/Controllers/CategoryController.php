<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        //Afficher une vue avec toutes les categories

        $categories = Category::all();

        return view("categories.index", ["categories" => $categories]);
    }

    public function create()
    {
        //Afficher une vue avec un formulaire d'ajout
        return view("categories.create");
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
        Category::create($data);
        return redirect()->route("categories");
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route("categories");
    }
}
