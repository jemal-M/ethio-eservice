<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return response()->json(
            [
                'success' => true,
                'data' => $users
            ]
        );
    }
    public function  show($id)
    {
        $user = \App\Models\User::find($id);
        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User not found'
                ]
            );
        }
        return response()->json(
            [
                'success' => true,
                'data' => $user
            ]
        );
    }
    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User not found'
                ]
            );
        }
        $user->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'User deleted successfully'
            ]
        );
    }
     public function store(Request $request)
      {
          $user = \App\Models\User::create($request->all());
          return response()->json(
              [
                  'success' => true,
                  'data' => $user
              ]
          );
      }
     public function update(Request $request, $id)
      {
          $user = \App\Models\User::find($id);
          if (!$user) {
              return response()->json(
                  [
                      'success' => false,
                      'message' => 'User not found'
                  ]
              );
          }
          $user->update($request->all());
          return response()->json(
              [
                  'success' => true,
                  'data' => $user
              ]
          );
      }
      
}
