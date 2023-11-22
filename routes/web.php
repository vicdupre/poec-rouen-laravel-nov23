<?php

use App\Http\Controllers\ExempleController;
use App\Http\Controllers\IngredientController;
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
