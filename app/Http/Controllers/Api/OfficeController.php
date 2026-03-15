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
        return response()->json(['message' => 'Hello from Office API','offices'=>$offices]);
    }

    public function store(Request $request)
    {
        $office = Office::create($request->all());
        return response()->json(['message' => 'Office created successfully', 'office'=>$office]);
    }

    public function show(Office $office)
    {
        return response()->json(['message' => 'Office retrieved successfully', 'office'=>$office]);
    }
     
    public function update(Request $request, Office $office)
    {
        $office->update($request->all());
        return response()->json(['message' => 'Office updated successfully', 'office'=>$office]);
    }
     
    public function destroy(Office $office)
    {
        $office->delete();
        return response()->json(['message' => 'Office deleted successfully', 'office'=>$office]);
    }
     
}
