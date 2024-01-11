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
        return view('volume.index');
    }

    public function fetch()
    {
        $volumes = Volume::all();
        return response()->json([
            'volumes'=>$volumes,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label'=> 'required|max:191',
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
            $volume->label = $request->input('label');
            $volume->save();
            return response()->json([
                'status'=>200,
                'message'=>'Volume ajouté avec succès.'
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
                'volume'=> $volume,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Aucun volume trouvé'
            ]);
        }

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'label'=> 'required|max:191',
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
                $volume->label = $request->input('label');
                $volume->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Volume mis à jour avec succès'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Aucun volume trouvé'
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
                'message'=>'Volume supprimé'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Aucun volume trouvé'
            ]);
        }
    }

}
