<?php

use App\Http\Controllers\api\LaundryController;
use App\Http\Controllers\api\PromoController;
use App\Http\Controllers\api\ShopController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Kutip 1 disebelah kanan adalah nama function

// PUBLIC
Route::get('/promo', [PromoController::class, 'readAll']);
Route::get('/shop', [ShopController::class, 'readAll']);
Route::get('/laundry', [LaundryController::class, 'readAll']);
Route::get('/user', [UserController::class, 'readAll']);

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


// BUTUH TOKEN YANG DI DAPAT DAR LOGIN 
Route::middleware('auth:sanctum')->group(function () {
    // laundry
    Route::get('/laundry/user/{id}', [LaundryController::class, 'whereUserId']);
    Route::post('/laundry/claim', [LaundryController::class, 'claim']);

    // promo
    Route::get('/promo/limit', [PromoController::class, 'readLimit']);

    // shop
    Route::get('/shop/reccommmendation/limit', [ShopController::class, 'readReccommendationLimit']);
    // {parameter di controller}
    Route::get('/shop/search/city/{name}', [ShopController::class, 'searchByCity']);
});
