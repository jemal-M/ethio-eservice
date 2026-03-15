<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
         $serviceCategories = \App\Models\ServiceCategory::all();
         return response()->json($serviceCategories);
    }

    public function show($id)
    {
        $serviceCategory = \App\Models\ServiceCategory::find($id);
        return response()->json($serviceCategory);
    }

    public function getServices($id)
    {
        $serviceCategory = \App\Models\ServiceCategory::find($id);
        $services = $serviceCategory->services;
        return response()->json($services);
    }
      public function store(Request $request)
    {
        $serviceCategory = new \App\Models\ServiceCategory();
        $serviceCategory->name = $request->name;
        $serviceCategory->save();

        return response()->json($serviceCategory);
    }
     public function update(Request $request, $id)
    {
        $serviceCategory = \App\Models\ServiceCategory::find($id);
        $serviceCategory->name = $request->name;
        $serviceCategory->save();

        return response()->json($serviceCategory);
    }
    public function delete($id)
    {
        $serviceCategory = \App\Models\ServiceCategory::find($id);
        $serviceCategory->delete();

        return response()->json(['message' => 'Service Category deleted successfully']);
    }

    public function search(Request $request)
    {
        $search = $request->query('q');
        $serviceCategories = \App\Models\ServiceCategory::where('name', 'like', "%$search%")->get();
        return response()->json($serviceCategories);
    }
     
}
