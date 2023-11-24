<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        return response()->json($ingredients);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            //La donnée à valider
            $request->all(),
            //Les règles de validation
            [
                "name" => ["required", "string", "min:2"],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $validator->validated();
        $ingredient = Ingredient::create($data);

        return response()->json($ingredient);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ingredient = Ingredient::findOrFail($id);

        return response()->json($ingredient);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make(
            //La donnée à valider
            $request->all(),
            //Les règles de validation
            [
                "name" => ["required", "string", "min:2"],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $validator->validated();
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($data);

        return response()->json($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return response()->json($ingredient);
    }
}
