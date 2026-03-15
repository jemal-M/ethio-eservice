<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        return response()->json(Region::all());
    }

    public function store(Request $request)
    {
        $region = new Region();
        $region->name = $request->name;
        $region->save();

        return response()->json($region);
    }

    public function destroy($id)
    {
        $region = Region::find($id);
        $region->delete();

        return response()->json(null, 204);
    }
   
    public function show($id)
    {
        $region = Region::find($id);
        return response()->json($region);
    }

    public function update(Request $request, $id)
    {
        $region = Region::find($id);
        $region->name = $request->name;
        $region->save();

        return response()->json($region);
    }
     
}
