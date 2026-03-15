<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        $roles = \App\Models\Role::with('permissions')->get();
        return Inertia::render('roles.index',[ 

            'roles'=>$roles
        ]);
    }

    public function create()
    {
        $permissions = Permission::all();
        return Inertia::render('roles.create',[
            'permissions'=>$permissions
        ]);
    }

    public function store(Request $request)
    {
        $role = \App\Models\Role::create($request->validate([
            'name'=>'required|unique:roles'
        ]));

        $role->permissions()->attach($request->permissions);

        return redirect()->back();
    }
    
    public function edit($id)
    {
        $role = \App\Models\Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return Inertia::render('roles.edit',[
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = \App\Models\Role::find($id);
        $role->update($request->validate([
            'name'=>'required|unique:roles,name,'.$role->id
        ]));

        $role->permissions()->sync($request->permissions);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $role = \App\Models\Role::find($id);
        $role->delete();

        return redirect()->back();
    }
      
}
