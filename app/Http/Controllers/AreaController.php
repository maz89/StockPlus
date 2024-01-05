<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    //
    public function index()
    {
        $area=Area::all();
        return view('erea.index')->with([
            "areas" => $area
        ]);
    }

    public function fetch_area()
    {
        $area = Area::all();
        return response()->json([
            'areas'=>$area,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wording'=> 'required|max:191',
            'salesman_id'=>'required',
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
            $area = new Area;
            $area->wording = $request->input('wording');
            $area->salesman_id = $request->input('salesman_id');
            $area->save();
            return response()->json([
                'status'=>200,
                'message'=>'Succès.'
            ]);
        }
    }
    public function edit($id)
    {
        $area = Area::find($id);
        if($area)
        {
            return response()->json([
                'status'=>200,
                'areas'=> $area,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Zone non trouvée.'
            ]);
        }

    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'wording'=> 'required|max:191',
            'salesman_id'=>'required',
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
            $area = Area::find($id);
            if($area)
            {
                $area->name = $request->input('wording');
                $area->pch = $request->input('salesman_id');
                $area->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'Succès.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Zone non trouvée.'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        if($area)
        {
            $area->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Supprimer.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Zone non trouvée.'
            ]);
        }
    }

}
