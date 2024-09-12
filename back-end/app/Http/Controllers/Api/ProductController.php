<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index (){
        $products = Product::all();

    return $products->count()>0?response()->json($products,200):response()->json(['massage'=>'there is no data'],200);



    }

    public function store (Request $request){





        $validator = Validator::make($request->all(),[
            'name' => ['required','string','min:5','max:100'],
            'description' => ['required','string','min:10','max:250' ],
            'price' => ['required','integer']
        ]);


        if($validator->fails()){
        return    response()->json(['message'=>'not vailed data'],400);

        }else{
            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ]);
            return    response()->json(['message'=>' vailed data'],200);

        }




    }

    public function show (Product $product){
        return response()->json($product);
    }


    public function update (Product $product, Request $request){

        $validator = Validator::make($request->all(),[
            'name' => ['required','string','min:5','max:100'],
            'description' => ['required','string','min:10','max:250' ],
            'price' => ['required','integer']
        ]);

        if($validator->fails()){
            return   response()->json(['message'=>'not vailed data to update'],400);
        }else{
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price
            ]);
            return    response()->json(['message'=>' vailed data to update'],200);
        }



    }


    public function destroy (Product $product){

        $product->delete();

        return    response()->json(['message'=>' product deleted correctly'],200);


    }

}
