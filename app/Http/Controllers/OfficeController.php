<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = \App\Models\Office::with('departments')->get();
        return Inertia::render('office.index',['offices'=>$offices]);
    }
    public function create(){
        $departments=Department::all();
     return Inertia::render('office.create',['departments'=>$departments]);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'department_id'=>'required'
        ]);
        \App\Models\Office::create($request->all());
        return redirect()->back();
    }
    public function show(\App\Models\Office $office){
        return Inertia::render('office.show', ['office'=>$office]);
    }
    public function edit(\App\Models\Office $office){
        $departments=Department::all();
        return Inertia::render('office.edit', ['office'=>$office,'departments'=>$departments]);
    }
    public function update(Request $request, \App\Models\Office $office){
        $request->validate([
            'name'=>'required',
            'department_id'=>'required'
        ]);
        $office->update($request->all());
        return redirect('/office');
    }
     public function destroy(\App\Models\Office $office){
        $office->delete();
        return redirect('/office');
    }
    public function getOfficeByDepartment($id){
        $offices=Department::find($id)->offices;
        return response()->json($offices);
    }
      
}
