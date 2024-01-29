<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    //
    public function index()
    {
        $type=Type::all();
        return view('type.index')->with([
            "types" => $type
        ]);
    }

    public function fetch_type()
    {
        $type = Type::all();
        return response()->json([
            'types'=>$type,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description'=> 'required|max:191',

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
            $type = new Type;
            $type->description = $request->input('description');
            $type->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        if($type)
        {
            $type->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimé.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Type de produit non trouvé.'
            ]);
        }
    }

}
