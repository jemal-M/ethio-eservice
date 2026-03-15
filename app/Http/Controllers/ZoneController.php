<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Zone;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ZoneController extends Controller
{
    public function index()
    {
        $zones=Zone::with(['region','woredas'])->get();
        return Inertia::render('zone.index',['zones'=>$zones]);
    }
   
    public function create()
    {
        $regions=Region::all();
         return Inertia::render('zone.create',['regions'=>$regions]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'region_id'=>'required|exists:regions,id'
        ]);
        Zone::create($validated);
        return redirect()->back();
    }

    public function update(Request $request, Zone $zone)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'region_id'=>'required|exists:regions,id'
        ]);
        $zone->update($validated);
        return redirect()->back();
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
        return redirect()->back();
    }
    public function edit($id){
        $zone=Zone::find($id);
        $regions=Region::all();
  return Inertia::render("zone.edit");
    }
}
