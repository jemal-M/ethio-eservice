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
        $request->validate([
            'name' => 'required|string|max:255',
            "code"=>"required|string|max:255|unique:regions"
        ]);
        $region = Region::create($request->all());
        return response()->json($region, 201);
    }

    public function show(Region $region)
    {
        return response()->json($region);
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'string|max:255',
            "code"=>"string|max:255|unique:regions"
        ]);
        $region->update($request->all());
        return response()->json($region);
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json(null, 204);
    }

    public function getProvinces(Region $region)
    {
        return response()->json($region->provinces);
    }
     
    public function getDistricts(Region $region)
    {
        return response()->json($region->districts);
    }
      
}
