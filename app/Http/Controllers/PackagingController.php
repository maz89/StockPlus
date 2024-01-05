<?php

namespace App\Http\Controllers;

use App\Models\Packaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackagingController extends Controller
{
    //
    public function index()
    {
        $packaging=Packaging::all();
        return view('erea.index')->with([
            "packagings" => $packaging
        ]);
    }

    public function fetch_packaging()
    {
        $packaging = Packaging::all();
        return response()->json([
            'packagings'=>$packaging,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|max:191',
            'address'=> 'required|max:191',
            'owner_id'=> 'required',
            'area_id'=> 'required',
            'packaging_id'=> 'required',
            'product_id'=> 'required',
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
            $packaging = new Packaging;
            $packaging->number = $request->input('number');
            $packaging->product_id = $request->input('product_id');
            $packaging->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit($id)
    {
        $packaging = Packaging::find($id);
        if($packaging)
        {
            return response()->json([
                'status'=>200,
                'packagings'=> $packaging,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Packaging non trouvé.'
            ]);
        }

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'number'=> 'required',
            'product_id'=> 'required',
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
            $packaging = Packaging::find($id);
            if($packaging)
            {
                $packaging->number = $request->input('number');
                $packaging->product_id = $request->input('product_id');
                $packaging->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Packaging non trouvé.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $packaging = Packaging::find($id);
        if($packaging)
        {
            $packaging->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimé.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Packaging non trouvé.'
            ]);
        }
    }

}
