<?php

namespace App\Http\Controllers;

use App\Models\Salesman;
use Illuminate\Http\Request;

class SalesmanController extends Controller
{
    //
    public function index()
    {
        $salesman=Salesman::all();
        return view('erea.index')->with([
            "salesmans" => $salesman
        ]);
    }

    public function fetch_salesman()
    {
        $salesman = Salesman::all();
        return response()->json([
            'salesmans'=>$salesman,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:191',
            'last_name'=> 'required|max:191',
            'gender'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'email'=> 'required',
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
            $salesman = new Salesman;
            $salesman->first_name = $request->input('first_name');
            $salesman->last_name = $request->input('last_name');
            $salesman->gender = $request->input('gender');
            $salesman->phone = $request->input('phone');
            $salesman->address = $request->input('address');
            $salesman->email = $request->input('email');
            $salesman->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit($id)
    {
        $salesman = Salesman::find($id);
        if($salesman)
        {
            return response()->json([
                'status'=>200,
                'salesmans'=> $salesman,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Commercial non trouvé.'
            ]);
        }

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:191',
            'last_name'=> 'required|max:191',
            'gender'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'email'=> 'required',
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
            $salesman = Salesman::find($id);
            if($salesman)
            {
                $salesman->first_name = $request->input('first_name');
                $salesman->last_name = $request->input('last_name');
                $salesman->gender = $request->input('gender');
                $salesman->phone = $request->input('phone');
                $salesman->address = $request->input('address');
                $salesman->email = $request->input('email');
                $salesman->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Commercial non trouvé.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $salesman = Salesman::find($id);
        if($salesman)
        {
            $salesman->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Commercial non trouvé.'
            ]);
        }
    }

}
