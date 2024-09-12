<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{

    public function index (){
        $restaurant = Restaurant::all();

        return response()->json($restaurant,200);


    }

    public function store (Request $request){



        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_ratings' => 'required|numeric',
        ]);


        if($validator->fails()){
        return    response()->json(['message'=>'not vailed data'],400);

        }else{
            Restaurant::create([
                'name' => $request->name,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'user_ratings' => $request->user_ratings,
            ]);
            return    response()->json(['message'=>' vailed data'],200);

        }




    }

    public function show (Restaurant $restaurant){

        return response()->json($restaurant);

    }


    public function update (Restaurant $Restaurant, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'user_ratings' => 'required|numeric',
        ]);

        if($validator->fails()){
            return   response()->json(['message'=>'not vailed data to update'],400);
        }else{
            $Restaurant->update([
                'name' => $request->name,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'user_ratings' => $request->user_ratings,
            ]);
            return    response()->json(['message'=>' vailed data to update'],200);
        }


    }


    public function destroy (Restaurant $Restaurant){

        $Restaurant->delete();

        return    response()->json(['message'=>' Restaurant deleted correctly'],200);

    }
}
