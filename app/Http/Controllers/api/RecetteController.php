<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recettes = Recette::all();

        return response()->json($recettes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => ["required", "string", "min:2"],
                "difficulty" => ["required", "integer", "numeric", "min:0", "max:4"],
                "time_to_prepare" => ["required",  "integer", "numeric", "min:1"],
                "category_id" => ["required", "exists:categories,id"],
                "ingredients" => ["required", "array"],
                "user_id" => ["required", "exists:users,id"]
            ]
        );

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        $data = $validator->validated();
        $display_time = $data["time_to_prepare"] . " minutes";

        if ($request->time_unit === "hour") {
            $display_time = $data["time_to_prepare"] . " heures";
            $data["time_to_prepare"] = $data["time_to_prepare"] * 60;
        }

        $data["display_time"] = $display_time;

        $recette = Recette::create($data);
        $recette->ingredients()->attach($data['ingredients']);

        return response()->json($recette, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recette = Recette::findOrFail($id);
        return response()->json($recette, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => ["required", "string", "min:2"],
                "difficulty" => ["required", "integer", "numeric", "min:0", "max:4"],
                "time_to_prepare" => ["required",  "integer", "numeric", "min:1"],
                "category_id" => ["required", "exists:categories,id"],
                "ingredients" => ["required", "array"],
                "user_id" => ["required", "exists:users,id"]
            ]
        );

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        $recette = Recette::findOrFail($id);

        $data = $validator->validated();
        $display_time = $data["time_to_prepare"] . " minutes";

        if ($request->time_unit === "hour") {
            $display_time = $data["time_to_prepare"] . " heures";
            $data["time_to_prepare"] = $data["time_to_prepare"] * 60;
        }

        $data["display_time"] = $display_time;

        $recette->ingredients()->sync($data["ingredients"]);
        $recette->update($data);

        return response()->json($recette, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recette = Recette::findOrfail($id);
        $recette->delete();
        return response()->json($recette);
    }
}
