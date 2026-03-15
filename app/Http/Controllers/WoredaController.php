<?php

namespace App\Http\Controllers;

use App\Models\Woreda;
use App\Models\Zone;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class WoredaController extends Controller
{
     public function index()
    {
        $zones=Zone::all();
        return Inertia::render('woredas.index',['zones'=>$zones]);
    }

    public function create()
    {
        $zones = Zone::all();
        return Inertia::render('woredas.create',['zones'=>$zones]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
             'zone_id' => 'required|exists:zones,id',
            
        ]);

        Woreda::create($validated);

        return redirect()->route('woredas.index')->with('success', 'Woreda created successfully.');
    }

    public function show(Woreda $woreda)
    {
         return Inertia::render('woredas.show', ['woreda'=>$woreda]);
    }

    public function edit(Woreda $woreda)
    {
        $zones = Zone::all();
        return Inertia::render('woredas.edit', ['woreda'=>$woreda,'zones'=>$zones]);
    }

    public function update(Request $request, Woreda $woreda)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'zone_id' => 'required|exists:zones,id',

        ]);

        $woreda->update($validated);

        return redirect()->route('woredas.index')->with('success', 'Woreda updated successfully.');
    }

    public function destroy(Woreda $woreda)
    {
        $woreda->delete();

        return redirect()->route('woredas.index')->with('success', 'Woreda deleted successfully.');
    }

    public function getWoredasByZone($zoneId)
    {
        $woredas = Woreda::where('zone_id', $zoneId)->get();
        return response()->json($woredas);
    }
    
}
