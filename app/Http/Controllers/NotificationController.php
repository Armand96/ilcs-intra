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
}
