<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dish;
use App\Models\UserFavoriteDish;
use Illuminate\Support\Facades\Validator;

class UserFavouriteDishController extends Controller
{    public function index (){
    $UserFavoriteDish = UserFavoriteDish::all();

    return response()->json($UserFavoriteDish,200);


}
public function show (UserFavoriteDish $UserFavoriteDish){
    return response()->json($UserFavoriteDish);
}
public function store(Request $request)
{
    $validator = Validator::make($request->all(),[
        'user_id' => 'required|exists:users,id ',
        'dish_id' => 'required|exists:dishes,id',
    ]);


    if($validator->fails()){
    return    response()->json(['message'=>'not vailed data'],400);

    }else{
        UserFavoriteDish::create([
            'user_id' => $request->user_id,
            'dish_id' => $request->dish_id,
        ]);
        return    response()->json(['message'=>' vailed data'],200);

    }
}



public function update(Request $request, UserFavoriteDish $userFavoriteDish)
{
    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id ',
        'dish_id' => 'required|exists:dishes,id',
    ]);


    if ($validator->fails()) {
        return response()->json(['message' => 'Invalid data for update', 'errors' => $validator->errors()], 400);
    }else{
        $userFavoriteDish->update([
            'user_id' => $request->user_id,
            'dish_id' => $request->dish_id,
        ]);
        return    response()->json(['message'=>' vailed data to update'],200);
    }

}




public function destroy (UserFavoriteDish $UserFavoriteDish){

    $UserFavoriteDish->delete();

    return    response()->json(['message'=>' UserFavoriteDish deleted correctly'],200);

}
}
