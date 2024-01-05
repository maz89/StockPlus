<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorController extends Controller
{
    //
    public function index()
    {
        $distributor=Distributor::all();
        return view('erea.index')->with([
            "distributors" => $distributor
        ]);
    }

    public function fetch_distributor()
    {
        $distributor = Distributor::all();
        return response()->json([
            'distributors'=>$distributor,
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
            $distributor = new Distributor;
            $distributor->name = $request->input('name');
            $distributor->address = $request->input('address');
            $distributor->owner_id = $request->input('owner_id');
            $distributor->area_id = $request->input('area_id');
            $distributor->packaging_id = $request->input('packaging_id');
            $distributor->product_id = $request->input('product_id');
            $distributor->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit($id)
    {
        $distributor = Distributor::find($id);
        if($distributor)
        {
            return response()->json([
                'status'=>200,
                'distributors'=> $distributor,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Distributeur non trouvé.'
            ]);
        }

    }
    public function update(Request $request, $id)
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
            $distributor = Distributor::find($id);
            if($distributor)
            {
                $distributor->name = $request->input('wording');
                $distributor->address = $request->input('address');
                $distributor->owner_id = $request->input('owner_id');
                $distributor->area_id = $request->input('area_id');
                $distributor->packaging_id = $request->input('packaging_id');
                $distributor->product_id = $request->input('product_id');
                $distributor->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Distributeur non trouvé.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $distributor = Distributor::find($id);
        if($distributor)
        {
            $distributor->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Distributeur non trouvée.'
            ]);
        }
    }

}
