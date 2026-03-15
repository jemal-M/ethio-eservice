<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
    public function store(Request $request){
          
        $user = User::create($request->all());
        return response()->json($user, 201);

    }
     
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function search($name){
        return response()->json(User::where('name','like','%'.$name.'%')->get());
    }

    public function searchEmail($email){
        return response()->json(User::where('email', 'like', '%'.$email.'%')->get());
    }

    public function searchId($id){
        return response()->json(User::where('id', '=', $id)->get());
    }

    public function searchName($name){
        return response()->json(User::where('name', 'like', '%'.$name.'%')->get());
    }

    public function searchNameEmail($name, $email){
        return response()->json(User::where('name', 'like', '%'.$name.'%')->where('email', 'like', '%'.$email.'%')->get());
    }
       

}
