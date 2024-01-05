<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    //
    public function index()
    {
        $owner=Owner::all();
        return view('erea.index')->with([
            "owners" => $owner
        ]);
    }

    public function fetch_owner()
    {
        $owner = Owner::all();
        return response()->json([
            'owners'=>$owner,
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
            $owner = new Owner;
            $owner->first_name = $request->input('first_name');
            $owner->last_name = $request->input('last_name');
            $owner->gender = $request->input('gender');
            $owner->phone = $request->input('phone');
            $owner->address = $request->input('address');
            $owner->email = $request->input('email');
            $owner->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit($id)
    {
        $owner = Owner::find($id);
        if($owner)
        {
            return response()->json([
                'status'=>200,
                'owners'=> $owner,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Propriétaire non trouvé.'
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
            $owner = Owner::find($id);
            if($owner)
            {
                $owner->first_name = $request->input('first_name');
                $owner->last_name = $request->input('last_name');
                $owner->gender = $request->input('gender');
                $owner->phone = $request->input('phone');
                $owner->address = $request->input('address');
                $owner->email = $request->input('email');
                $owner->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Propriétaire non trouvé.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $owner = Owner::find($id);
        if($owner)
        {
            $owner->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Propriétaire non trouvé.'
            ]);
        }
    }

}
