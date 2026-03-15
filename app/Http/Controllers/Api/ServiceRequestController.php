<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index()
    {
   
    $service_requests = ServiceRequest::all();
    return response()->json($service_requests);
    }

    public function show(ServiceRequest $service_request)
    {
        return response()->json($service_request);
    }

    public function store(Request $request)
    {
        $service_request = ServiceRequest::create($request->all());
        return response()->json($service_request, 201);
    }

    public function update(Request $request, ServiceRequest $service_request)
    {
        $service_request->update($request->all());
        return response()->json($service_request, 200);
    }

    public function delete(ServiceRequest $service_request)
    {
        $service_request->delete();
        return response()->json(null, 204);
    }
     
    
}
