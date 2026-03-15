<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();
        return response()->json($offices);
    }

    public function show(Office $office)
    {
        return response()->json($office);
    }

    public function nearby(Request $request)
    {
        $offices = Office::nearby($request->longitude, $request->latitude)->get();
        return response()->json($offices);
    }
     public function search(Request $request)
    {
        $offices = Office::search($request->name)->get();
        return response()->json($offices);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);
        $office = Office::create($request->all());
        return response()->json($office, 201);
    }
    public function update(Request $request, Office $office)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required',
        ]);
        $office->update($request->all());
        return response()->json($office);
    }
    public function destroy(Office $office)
    {
        $office->delete();
        return response()->json(null, 204);
    }
     
}
