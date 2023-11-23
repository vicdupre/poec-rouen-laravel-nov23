<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour les recettes 
Route::get("/recettes", [RecetteController::class, "index"])->name("recettes");
Route::get("/recettes/create", [RecetteController::class, "create"])->name("recettes.create");
Route::post("/recettes", [RecetteController::class, "store"])->name("recettes.store");
Route::delete("/recettes/{id}", [RecetteController::class, "destroy"])->name("recettes.destroy");


// Routes pour les ingrédients 
Route::get("/ingredients", [IngredientController::class, "index"])->name("ingredients");
Route::get("/ingredients/create", [IngredientController::class, "create"])->name("ingredients.create");
Route::post("/ingredients", [IngredientController::class, "store"])->name("ingredients.store");
Route::delete("/ingredients/{id}", [IngredientController::class, "destroy"])->name("ingredients.destroy");


// Routes pour les catégories
Route::get("/categories", [CategoryController::class, "index"])->name("categories");
Route::get("/categories/create", [CategoryController::class, "create"])->name("categories.create");
Route::post("/categories", [CategoryController::class, "store"])->name("categories.store");
Route::delete("/categories/{id}", [CategoryController::class, "destroy"])->name("categories.destroy");



require __DIR__ . '/auth.php';
