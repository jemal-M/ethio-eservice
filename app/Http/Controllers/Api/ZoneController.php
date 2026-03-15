<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index()
    {
        $zones=Zone::all();
        return response()->json($zones);
    }

    public function show($id)
    {
        $zone = Zone::find($id);
        if (!$zone) {
            return response()->json(['message' => 'Zone not found'], 404);
        }
        return response()->json($zone);
    }

    public function getZoneByRegion($regionId)
    {
        $zones = Zone::where('region_id', $regionId)->get();
        return response()->json($zones);
    }
     
    public function store(Request $request)
    {
        $request->validate($request, [
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
        ]);
        $zone = Zone::create($request->all());
        return response()->json($zone, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate($request, [
            'name' => 'string|max:255',
            'region_id' => 'exists:regions,id',
        ]);
        $zone = Zone::find($id);
        if (!$zone) {
            return response()->json(['message' => 'Zone not found'], 404);
        }
        $zone->update($request->all());
        return response()->json($zone);
    }

    public function destroy($id)
    {
        $zone = Zone::find($id);
        if (!$zone) {
            return response()->json(['message' => 'Zone not found'], 404);
        }
        $zone->delete();
        return response()->json(['message' => 'Zone deleted successfully']);
    }

    public function getZoneWithRegion()
    {
        $zones = Zone::with('region')->get();
        return response()->json($zones);
    }

    public function getZoneWithRegionById($id)
    {
        $zone = Zone::with('region')->find($id);
        if (!$zone) {
            return response()->json(['message' => 'Zone not found'], 404);
        }
        return response()->json($zone);
    }
    
}
