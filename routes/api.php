<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ServiceController;


Route::get("/clients", [ClientController::class, 'index']);
Route::post("/clients", [ClientController::class, 'store']);
Route::get("/clients/{client}", [ClientController::class, 'show']);
Route::put("/clients/{client}", [ClientController::class, 'update']);
Route::delete("/clients/{client}", [ClientController::class, 'destroy']);

Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services', [ServiceController::class, 'store']);
Route::get('/services/{service}', [ServiceController::class, 'show']);
Route::put('/services/{service}', [ServiceController::class, 'update']);
Route::delete('/services/{service}', [ServiceController::class, 'destroy']);

Route::post('/clients/services', [ClientController::class,'attach']);

Route::post('/clients/services/detach', [ClientController::class,'detach']);

Route::post('/services/clients', [ServiceController::class,'clients']);