<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserFavoriteLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserFavouriteLocationController extends Controller
{

    public function index (){
    $UserFavouriteLocation=UserFavoriteLocation::all();

    return response()->json($UserFavouriteLocation,200);


    }

    public function store (Request $request){
            // Validate the incoming request data
        $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id', // Ensure user_id exists in users table
        'tourist_locations_id' => 'required|exists:tourist_locations,id', // Ensure tourist_locations_id exists in tourist_locations table
    ]);
    // Check if validation fails
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Invalid data',
            'errors' => $validator->errors(),
        ], 400);
    }else{
        UserFavoriteLocation::create([
            'user_id'=>$request->user_id,
            'tourist_locations_id'=>$request->tourist_locations_id
        ]);
    }






    }

    public function show ( UserFavoriteLocation $UserFavoriteLocation){
        return response()->json($UserFavoriteLocation);

    }


    public function update (Request $request, UserFavoriteLocation $UserFavoriteLocation){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in users table
            'tourist_locations_id' => 'required|exists:tourist_locations,id', // Ensure tourist_locations_id exists in tourist_locations table
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => $validator->errors(),
            ], 400);}
            else{
                $UserFavoriteLocation->update([
                    'user_id'=>$request->user_id,
                    'tourist_locations_id'=>$request->tourist_locations_id
                ]);
            }




    }


    public function destroy (UserFavoriteLocation $UserFavoriteLocation){

        $UserFavoriteLocation->delete();

        return    response()->json(['message'=>' UserFavoriteLocation deleted correctly'],200);

    }
}
