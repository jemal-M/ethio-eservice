<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->unreadNotifications;
        return Inertia::render('notification.index',['notifications'=>$notifications]);

    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->unreadNotifications->find($id);
        $notification->markAsRead();
        return back();
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back();
    }

    public function destroy($id)
    {
        $notification = Auth::user()->notifications->find($id);
        $notification->delete();
        return back();
    }

    public function destroyAll()
    {
        Auth::user()->notifications()->delete();
        return back();
    }
     

}
