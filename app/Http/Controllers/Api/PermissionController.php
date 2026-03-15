<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
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
    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return response()->json($permission, 200);
    }

    public function show(Permission $permission)
    {
          
        return response()->json($permission);

    }

    public function rolePermissions($role)
    {
        $role = Role::with('permissions')->where('name', $role)->first();
        return response()->json($role->permissions);
    }

    public function permissionRoles($permission)
    {
        $permission = Permission::with('roles')->where('name', $permission)->first();
        return response()->json($permission->roles);
    }

    public function attachPermission(Request $request, Role $role)
    {
        $role->permissions()->attach($request->permission_id);
        return response()->json($role->permissions);
    }

    public function detachPermission(Role $role, Permission $permission)
    {
        $role->permissions()->detach($permission->id);
        return response()->json($role->permissions);
    }
     
       
}
