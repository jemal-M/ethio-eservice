<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PermissionController extends Controller
{
     public function index()
    {
        return Inertia::render('permission.index');
    }

    public function create()
    {
        $permissions=Permission::all();
        return Inertia::render('permission.create');
    }
}
