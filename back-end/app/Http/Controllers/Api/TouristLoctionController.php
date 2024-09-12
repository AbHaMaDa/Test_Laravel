<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TouristLocation;
use Illuminate\Support\Facades\Validator;

class TouristLoctionController extends Controller
{
    public function index (){
        $restaurant = TouristLocation::all();

        return response()->json($restaurant,200);


    }

    public function store (Request $request){



        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'address' => 'required|string|max:200',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'type' => 'required|string|max:50',
            'image' => 'required|string|max:255', // Ensure it's a URL or path if it's an image
            'user_ratings' => 'required|numeric|between:0,5',
            'number_of_visitors' => 'required|integer|min:0',

        ]);


        if($validator->fails()){
        return    response()->json(['message'=>'not vailed data'],400);

        }else{
            TouristLocation::create([
                'name' => $request->name,
                'description' => $request->description,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'type' => $request->type,
                'image' => $request->image,
                'user_ratings' => $request->user_ratings,
                'number_of_visitors' => $request->number_of_visitors,

            ]);
            return    response()->json(['message'=>' vailed data'],200);

        }




    }

    public function show (TouristLocation $restaurant){

        return response()->json($restaurant);

    }


    public function update (TouristLocation $TouristLocation, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'address' => 'required|string|max:200',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'type' => 'required|string|max:50',
            'image' => 'required|string|max:255', // Ensure it's a URL or path if it's an image
            'user_ratings' => 'required|numeric|between:0,5',
            'number_of_visitors' => 'required|integer|min:0',
        ]);

        if($validator->fails()){
            return   response()->json(['message'=>'not vailed data to update'],400);
        }else{
            $TouristLocation->update([
                'name' => $request->name,
                'description' => $request->description,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'type' => $request->type,
                'image' => $request->image,
                'user_ratings' => $request->user_ratings,
                'number_of_visitors' => $request->number_of_visitors,
            ]);
            return    response()->json(['message'=>' vailed data to update'],200);
        }


    }


    public function destroy (TouristLocation $TouristLocation){

        $TouristLocation->delete();

        return    response()->json(['message'=>' TouristLocation deleted correctly'],200);

    }
}
