<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Woreda;
use Illuminate\Http\Request;

class WoredaController extends Controller
{
     public function index()
    {
        $woredas = Woreda::all();
        return response()->json($woredas);
    }

    public function show($id)
    {
        $woreda = Woreda::find($id);
        return response()->json($woreda);
    }
    public function store(Request $request)
    {
        $request->validate($request, [
            'name' => 'required',
            'zone_id' => 'required'
        ]);
        $woreda = Woreda::create($request->all());
        return response()->json($woreda, 201);
    }
    public function update(Request $request, $id)
    {
        $request->validate($request, [
            'name' => 'required',
            'zone_id' => 'required'
        ]);
        $woreda = Woreda::find($id);
        $woreda->update($request->all());
        return response()->json($woreda, 200);
    }
    public function delete($id)
    {
        $woreda = Woreda::find($id);
        $woreda->delete();
        return response()->json(null, 204);
    }
    public function getZoneWoredas($zone_id)
    {
        $woredas = Woreda::where('zone_id',$zone_id)->get();
        return response()->json($woredas);
    }
    
}
