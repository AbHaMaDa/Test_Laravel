<?php

use App\Http\Controllers\Api\DishController;
// use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\RestaurantDishController;
use App\Http\Controllers\Api\TouristLoctionController;
use App\Http\Controllers\Api\UserFavouriteDishController;
use App\Http\Controllers\Api\UserFavouriteLocationController;
use App\Http\Controllers\Api\UserFavouriteRestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource("/tourist-location",TouristLoctionController::class);


Route::apiResource("/dish",DishController::class);

Route::apiResource(name: "/restaurant",controller: RestaurantController::class);

Route::apiResource("/user-favourite-location",controller: UserFavouriteLocationController::class);

Route::apiResource("/user-favourite-dish",controller: UserFavouriteDishController::class);

Route::apiResource("/user-favourite-restaurant",controller: UserFavouriteRestaurantController::class);


Route::apiResource("/restaurant-dish",controller: RestaurantDishController::class);


// Route::apiResource("/products",ProductController::class);


