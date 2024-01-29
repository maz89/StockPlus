<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product=Product::all();
        return view('product.index')->with([
            "products" => $product
        ]);
    }

    public function fetch()
    {
        $product = Product::all();
        return response()->json([
            'products'=>$product,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description'=> 'required|max:191',
            'type_id'=> 'required',
            'volume_id'=> 'required',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $product = new Product;
            $product->description = $request->input('description');
            $product->type_id = $request->input('type_id');
            $product->volume_id = $request->input('volume_id');
            $product->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product)
        {
            $product->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Produit non trouvé.'
            ]);
        }
    }

}
