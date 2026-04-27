<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;


Route::get('/', [RestaurantController::class, 'index']);
Route::get('restaurant/{id}', [RestaurantController::class, 'show']);
Route::get('create', [CommandeController::class, 'store']);
Route::post('historique', [ClientController::class, 'historique']);
