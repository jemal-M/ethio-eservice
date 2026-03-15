<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('users.index');
    }

    public function create()
    {
        return Inertia::render('users.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create($validateData);
        return redirect('/users');
    }

    public function show($id)
    {
         return Inertia::render('users.show', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
         return Inertia::render('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->update($validateData);
        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->get();
        return response()->json($users);
    }

    public function all()
    {
        $users = User::all();
        return response()->json($users);
    }
     
}
