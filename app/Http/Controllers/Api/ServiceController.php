<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services= Service::all();
        return response()->json($services);
    }

    public function show($id)
    {
        $service=Service::find($id);
        return response()->json($service);
    }

    public function service_provider($id)
    {
        $service=Service::find($id)->service_provider;
        return response()->json($service);
    }
    public function store(Request $request){
         
        $service=Service::create($request->all());
        return response()->json($service);

    }

    public function update(Request $request,$id){

        $service=Service::find($id);
        $service->update($request->all());
        return response()->json($service);

    }
      
    public function delete($id){

        $service=Service::find($id);
        $service->delete();
        return response()->json(['message' => 'Deleted successfully']);

    }

    public function service_requests($id){

        $service=Service::find($id)->service_requests;
        return response()->json($service);

    }
       
}
