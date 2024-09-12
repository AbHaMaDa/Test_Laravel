<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserFavoriteRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserFavouriteRestaurantController extends Controller
{

    public function index (){
        $UserFavoriteRestaurant=UserFavoriteRestaurant::all();

        return response()->json($UserFavoriteRestaurant,200);


        }
        public function store (Request $request){
            // Validate the incoming request data
        $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id', // Ensure user_id exists in users table
        'restaurant_id' => 'required|exists:tourist_locations,id', // Ensure tourist_locations_id exists in tourist_locations table
    ]);
    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Invalid data',
            'errors' => $validator->errors(),
        ], 400);
    }else{
        UserFavoriteRestaurant::create([
            'user_id'=>$request->user_id,
            'tourist_locations_id'=>$request->tourist_locations_id
        ]);
    }

    }

    public function show ( UserFavoriteRestaurant $UserFavoriteRestaurant){
        return response()->json($UserFavoriteRestaurant);

    }



    public function update (Request $request, UserFavoriteRestaurant $UserFavoriteRestaurant){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in users table
            'restaurant_id' => 'required|exists:restaurants,id', // Ensure tourist_locations_id exists in tourist_locations table
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => $validator->errors(),
            ], 400);}
            else{
                $UserFavoriteRestaurant->update([
                    'user_id'=>$request->user_id,
                    'restaurant_id'=>$request->restaurant_id
                ]);
            }




    }


    public function destroy (UserFavoriteRestaurant $UserFavoriteRestaurant){

        $UserFavoriteRestaurant->delete();

        return    response()->json(['message'=>' UserFavoriteRestaurant deleted correctly'],200);

    }
}
