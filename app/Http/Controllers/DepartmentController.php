<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = \App\Models\Department::with('users','offices')->get();
        return Inertia::render('department',['departments'=>$departments]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description'=>'required'
        ]);
        \App\Models\Department::create($validatedData);
        return redirect()->back();
    }

    public function destroy(\App\Models\Department $department)
    {
        $department->delete();
        return redirect()->back();
    }

    public function update(Request $request, \App\Models\Department $department)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description'=>'required'
        ]);
        $department->update($validatedData);
        return redirect()->back();
    }

    public function show(\App\Models\Department $department)
    {
        $department->load('users', 'offices');
        return Inertia::render('department/show', ['department'=>$department]);
    }

    public function edit(\App\Models\Department $department)
    {
        $department->load('users', 'offices');
        return Inertia::render('department/edit', ['department'=>$department]);
    }
    
}
