<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ScreenController;
use Illuminate\Support\Facades\Route;

Route::get('/home-test', function () {
    return response()->json([
        'result' => 'home test ok',
    ]);
});


Route::prefix('/screens')->group(function () {
    Route::get('/{id}', [ScreenController::class, 'show']);
});

Route::get('/cars', CarController::class);
