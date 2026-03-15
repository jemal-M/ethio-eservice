<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kebelie;
use Illuminate\Http\Request;

class KebelieController extends Controller
{
    public function index()
    {
        $kebelies = Kebelie::all();
        return response()->json($kebelies);
    }

    public function store(Request $request)
    {
        $kebelie = Kebelie::create($request->all());
        return response()->json($kebelie, 201);
    }

    public function show(Kebelie $kebelie)
    {
        return response()->json($kebelie);
    }

    public function update(Request $request, Kebelie $kebelie)
    {
        $kebelie->update($request->all());
        return response()->json($kebelie);
    }
    
    public function destroy(Kebelie $kebelie)
    {
        $kebelie->delete();
        return response()->json(null, 204);
    }
     
}
