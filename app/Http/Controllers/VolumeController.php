<?php

namespace App\Http\Controllers;

use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VolumeController extends Controller
{
    //
    public function index()
    {
        $volumes=Volume::all();
        return view('volume.index')->with([
            "volumes" => $volumes
        ]);
    }

    public function fetchvolume()
    {
        $volume = Volume::all();
        return response()->json([
            'volumes'=>$volume,
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
            $volume = new Volume;
            $volume->description = $request->input('description');
            $volume->save();
            return response()->json([
                'status'=>200,
                'message'=>'Volume Added Successfully.'
            ]);
        }
    }
    public function edit($id)
    {
        $volume = Volume::find($id);
        if($volume)
        {
            return response()->json([
                'status'=>200,
                'volumes'=> $volume,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Volume Found.'
            ]);
        }

    }
    public function update(Request $request, $id)
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
            $volume = Volume::find($id);
            if($volume)
            {
                $volume->description = $request->input('description');
                $volume->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Volume Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Volume Found.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $volume = Volume::find($id);
        if($volume)
        {
            $volume->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Volume Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Volume Found.'
            ]);
        }
    }

}
