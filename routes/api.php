<?php
use App\Http\Controllers\TheMealDbController;

Route::get('/meals/search',         [TheMealDbController::class, 'search']);
Route::get('/meals/categories',     [TheMealDbController::class, 'categories']);
Route::get('/meals/by-category',    [TheMealDbController::class, 'byCategory']);
Route::get('/meals/by-country',     [TheMealDbController::class, 'byCountry']);
Route::get('/meals/by-ingredient',  [TheMealDbController::class, 'byIngredient']);
Route::get('/meals/countries',      [TheMealDbController::class, 'countries']);
Route::get('/meals/ingredients',    [TheMealDbController::class, 'ingredients']);
Route::get('/meals/random',         [TheMealDbController::class, 'random']);

Route::get('/meals/{id}',           [TheMealDbController::class, 'detail']);