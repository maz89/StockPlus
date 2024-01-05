<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function index()
    {
        $type=Type::all();
        return view('erea.index')->with([
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
            'wording'=> 'required|max:191',

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
            $type->wording = $request->input('wording');
            $type->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit($id)
    {
        $type = Type::find($id);
        if($type)
        {
            return response()->json([
                'status'=>200,
                'types'=> $type,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Type non trouvé.'
            ]);
        }

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'wording'=> 'required|max:191',
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
            $type = Type::find($id);
            if($type)
            {
                $type->wording = $request->input('wording');
                $type->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Type non trouvé.'
                ]);
            }
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
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Type non trouvée.'
            ]);
        }
    }

}
