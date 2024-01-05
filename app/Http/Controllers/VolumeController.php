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
        $volume=Volume::all();
        return view('erea.index')->with([
            "volumes" => $volume
        ]);
    }

    public function fetch_volume()
    {
        $volume = Volume::all();
        return response()->json([
            'volumes'=>$volume,
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
            $volume = new Volume;
            $volume->wording = $request->input('wording');
            $volume->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit_volume($id)
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
                'message'=>'volume non trouvé.'
            ]);
        }

    }
    public function update_volume(Request $request, $id)
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
            $volume = Volume::find($id);
            if($volume)
            {
                $volume->wording = $request->input('wording');
                $volume->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'volume non trouvé.'
                ]);
            }
        }
    }

    public function destroy_volume($id)
    {
        $volume = Volume::find($id);
        if($volume)
        {
            $volume->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'volume non trouvée.'
            ]);
        }
    }

}
