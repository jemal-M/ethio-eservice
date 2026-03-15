<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
     public function index()
    {
         $departments=Department::all();
         return response()->json($departments);
    }

    public function store(Request $request)
    {
        $department = Department::create($request->all());
        return response()->json($department, 201);
    }

    public function show($id)
    {
        $department=Department::find($id);
        return response()->json($department);
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->update($request->all());
        return response()->json($department, 200);
    }

    public function delete($id)
    {
        $department = Department::find($id);
        $department->delete();
        return response()->json(null, 204);
    }
     
}
