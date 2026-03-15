<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        $services=Service::all();
        return Inertia::render('services.Index',['services'=>$services]);
    }

    public function create()
    {
        return Inertia::render('services.Create');
    }

    public function store(Request $request)
    {
        $service=new Service();
        $service->name=$request->name;
        $service->description=$request->description;
         $service->fee=$request->fee;
        $service->save();
        return redirect()->back();
    }

    public function show(Service $service)
    {
          return Inertia::render('services.Show',['service'=>$service]);
    }

    public function edit(Service $service)
    {
        return Inertia::render('services.Edit', ['service'=>$service]);
    }

    public function update(Request $request, Service $service)
    {
        $service->name=$request->name;
        $service->description=$request->description;
         $service->fee=$request->fee;
        $service->save();
        return redirect()->back();
    }
    
}
