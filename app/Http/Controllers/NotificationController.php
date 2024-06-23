<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use NotificationTrait;

    public function unreadNotif()
    {
        $data = Notification::where('is_read', false)->orderBy('created_at', 'DESC')->limit(5)->get();
        return $data;
    }

    public function allNotif()
    {
        $notifs = $this->getAllNotification();
        return response()->json($notifs);
    }

    public function readNotif($notifId)
    {
        $notif = Notification::find($notifId);
        $notif->update(['read_at' => date('Y-m-d H:i:s')]);
        return response()->redirectToRoute('navigate.post', $notif->link);
    }
}
