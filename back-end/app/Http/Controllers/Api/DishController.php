<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    public function index (){
        $dishs = Dish::all();

    return $dishs->count()>0?response()->json($dishs,200):response()->json(['massage'=>'there is no data'],200);



    }

    public function store (Request $request){





        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'region' => 'required|string|max:100',
            'image' => 'required|string|max:255', // Ensure it's a URL or path
            'user_ratings' => 'required|numeric|between:0,5',
        ]);


        if($validator->fails()){
        return    response()->json(['message'=>'not vailed data'],400);

        }else{
            Dish::create([
                'name' => $request->name,
                'description' => $request->description,
                'region' => $request->region,
                'image' => $request->image,
                'user_ratings' => $request->user_ratings,
            ]);
            return    response()->json(['message'=>' vailed data'],200);

        }




    }

    public function show (Dish $dish){
        return response()->json($dish);
    }


    public function update (Dish $dish, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'region' => 'required|string|max:100',
            'image' => 'required|string|max:255', // Ensure it's a URL or path
            'user_ratings' => 'required|numeric|between:0,5',
        ]);

        if($validator->fails()){
            return   response()->json(['message'=>'not vailed data to update'],400);
        }else{
            $dish->update([
                'name' => $request->name,
                'description' => $request->description,
                'region' => $request->region,
                'image' => $request->image,
                'user_ratings' => $request->user_ratings,
            ]);
            return    response()->json(['message'=>' vailed data to update'],200);
        }



    }


    public function destroy (Dish $dish){

        $dish->delete();

        return    response()->json(['message'=>' dish deleted correctly'],200);


    }

}
