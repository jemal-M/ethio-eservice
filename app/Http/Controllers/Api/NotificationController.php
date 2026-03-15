<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function list()
    {
        return Auth::user()->notifications->map(function ($item) {
            return [
                'id' => $item->id,
                'type' => $item->type,
                'data' => $item->data,
                'read_at' => $item->read_at,
                'created_at' => $item->created_at->diffForHumans(),
            ];
        });
    }

    public function read($id)
    {
        $notification = Auth::user()->notifications->find($id);
        if ($notification) {
            $notification->update(['read_at' => now()]);
            return response()->json(['message' => 'ok']);
        }
        return response()->json(['message' => 'not found'], 404);
    }

    public function delete($id)
    {
        $notification = Auth::user()->notifications->find($id);
        if ($notification) {
            $notification->delete();
            return response()->json(['message' => 'ok']);
        }
        return response()->json(['message' => 'not found'], 404);
    }

    public function readAll()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return response()->json(['message' => 'ok']);
    }
     
    public function unreadCount()
    {
        return Auth::user()->unreadNotifications->count();
    }
     
}
