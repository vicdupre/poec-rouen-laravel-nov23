<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExempleController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecetteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ExempleController::class, 'index'])->name("home");

Route::get("/products", [ExempleController::class, 'products'])->name("products");

Route::get("/client", function () {
    return view("layout.client");
});

Route::get("/ingredients", [IngredientController::class, "index"])
    ->name("ingredients");
Route::get("/ingredients/create", [IngredientController::class, "create"])
    ->name("ingredients.create");
Route::post("/ingredients", [IngredientController::class, "store"])
    ->name("ingredients.store");
Route::delete("/ingredients/{id}", [IngredientController::class, "destroy"])
    ->name("ingredients.destroy");

Route::get("/categories", [CategoryController::class, "index"])
    ->name("categories");
Route::get("/categories/create", [CategoryController::class, "create"])
    ->name("categories.create");
Route::post("/categories", [CategoryController::class, "store"])
    ->name("categories.store");
Route::delete("/categories/{id}", [CategoryController::class, "destroy"])
    ->name("categories.destroy");

Route::get("/recettes", [RecetteController::class, "index"])
    ->name("recettes");
Route::get("/recettes/create", [RecetteController::class, "create"])
    ->name("recettes.create");
Route::post("/recettes", [RecetteController::class, "store"])
    ->name("recettes.store");
Route::delete("/recettes/{id}", [RecetteController::class, "destroy"])
    ->name("recettes.destroy");
