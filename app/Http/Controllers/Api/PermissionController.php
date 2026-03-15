<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());
        return response()->json($permission, 201);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json(null, 204);
    }
    public function update(Request $request, Permission $permission){
           $request->validate(
                  [
                    'name'=>'required|string|unique:permissions,name,'.$permission->id,
                    'role_id'=>'required'
                  ]
           );
           $permission->update($request->all());
    }

    public function show(Permission $permission){
           return response()->json($permission);
    }

    public function search($name){
           $permission=Permission::where('name','like','%'.$name.'%')->get();
           return response()->json($permission);
    }
     
}
