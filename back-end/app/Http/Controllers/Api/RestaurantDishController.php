<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantDish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantDishController extends Controller
{
    public function index (){
        $RestaurantDish = RestaurantDish::all();

        return response()->json($RestaurantDish,200);


    }
    public function show (RestaurantDish $RestaurantDish){
        return response()->json($RestaurantDish);
    }
    public function store(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'restaurant_id' => 'required|exists:restaurants,id',
        'dish_id' => 'required|exists:dishes,id',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json(['message' => 'Invalid data provided', 'errors' => $validator->errors()], 400);
    }else{
        RestaurantDish::create([
            'restaurant_id' => $request->restaurant_id,
            'dish_id' => $request->dish_id,
        ]);
    }


    // Return a success response
    return response()->json(['message' => 'Dish added to restaurant successfully'], 201);
}



    public function update(Request $request, RestaurantDish $RestaurantDish)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'restaurant_id' => 'required|exists:restaurants,id',
        'dish_id' => 'required|exists:dishes,id',
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return response()->json(['message' => 'Invalid data provided for update', 'errors' => $validator->errors()], 400);
    }else{
        $RestaurantDish->update([
            'restaurant_id' => $request->restaurant_id,
            'dish_id' => $request->dish_id,
        ]);
    }



    // Return a success response
    return response()->json(['message' => 'Restaurant dishes updated successfully'], 200);
}



    public function destroy (RestaurantDish $RestaurantDish){

        $RestaurantDish->delete();

        return    response()->json(['message'=>' RestaurantDish deleted correctly'],200);

    }
}
