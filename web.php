<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//Home Page
Route::get('/', [RecipeController::class, 'homePage'])->name('foodies.home');
Route::get('/recipes/{id}', [RecipeController::class, 'homeDetails'])->name('recipe.details2');

//Add Recipe
Route::get('/addRecipe', [RecipeController::class, 'addRecipe'])->name('add.recipe');
Route::post('/addRecipe/Store', [RecipeController::class, 'storeRecipe'])->name('store.recipe');

//Login & Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('doregister', [AuthController::class,'doregister'])->name('doregister');
Route::get('/profile', [Authcontroller::class, 'profile'])->name('profile');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

// All recipes
Route::get('/allRecipes', [RecipeController::class, 'allRecipes'])->name('allRecipes');
Route::get('/recipes/{id}', [RecipeController::class, 'details'])->name('recipe.details');

// Delete
Route::get('/recipes/{id}/delete', [RecipeController::class, 'deleteConfirmation'])->name('delete.confirmation');
Route::delete('/recipes/{id}', [RecipeController::class, 'deleteRecipe'])->name('delete.recipe');

//Edit
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipe.edit');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipe.update');


