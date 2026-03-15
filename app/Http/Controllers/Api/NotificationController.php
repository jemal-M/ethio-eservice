<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
     public function __invoke(Request $request)
    {
        return $request->user()->unreadNotifications->groupBy('type');
    }
    public function index(){
          
        return Auth::user()->unreadNotifications;
    }
    public function read(Request $request, $id){

        $notification = $request->user()->notifications->find($id);
        if($notification){
            $notification->update(['read_at' => now()]);
        }
        return response('',204);
    }
    public function readAll(Request $request){

        $request->user()->unreadNotifications->each(function ($item){
            $item->update(['read_at' => now()]);
        });

        return response('', 204);
    }

    public function count(Request $request){

        return ['count' => $request->user()->unreadNotifications->count()];
    }

    public function show(Request $request, $id){

        $notification = $request->user()->notifications->find($id);

        return response()->json($notification);
    }

    public function destroy(Request $request, $id){

        $notification = $request->user()->notifications->find($id);
        if($notification){
            $notification->delete();
        }
        return response('', 204);
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = $request->user()->notifications->find($id);
        if ($notification) {
            $notification->markAsRead();
        }

        return response('', 204);
    }
     
    public function markAllAsRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();

        return response('', 204);
    }

    public function markAllAsUnRead(Request $request)
    {
        $request->user()->readNotifications->markAsUnread();

        return response('', 204);
    }

    public function readAt(Request $request, $id)
    {
        $notification = $request->user()->notifications->find($id);
        if ($notification) {
            return response()->json($notification->read_at);
        }
        return response('', 404);
    }

    public function createdAt(Request $request, $id)
    {
        $notification = $request->user()->notifications->find($id);
        if ($notification) {
            return response()->json($notification->created_at);
        }
        return response('', 404);
    }
   
    public function notificationCountForSidebar(Request $request)
    {

        $count = $request->user()->unreadNotifications->count();

        return response()->json(['count' => $count]);
    }

    public function notificationCountForDropdown(Request $request)
    {

        $count = $request->user()->unreadNotifications->count();

        return response()->json(['count' => $count]);
    }

    public function notificationList(Request $request)
    {

        $notifications = $request->user()->notifications()->latest()->paginate(5);

        return response()->json($notifications);
    }
     
    public function notificationListForSpecificUser(Request $request, $userId)
    {

        $notifications = $request->user()->notifications()->latest()->paginate(5);

        return response()->json($notifications);
    }

    public function notificationListForAdmin(Request $request)
    {

        $notifications = $request->user()->notifications()->latest()->paginate(5);

        return response()->json($notifications);
    }

    public function notificationListForSuperAdmin(Request $request)
    {

        $notifications = $request->user()->notifications()->latest()->paginate(5);

        return response()->json($notifications);
    }

    public function notificationListForModerator(Request $request)
    {

        $notifications = $request->user()->notifications()->latest()->paginate(5);

        return response()->json($notifications);
    }
     
}
