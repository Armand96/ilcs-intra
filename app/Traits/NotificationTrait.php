<?php

namespace App\Traits;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait NotificationTrait
{

    /**
     * Get upcoming all notification user.
     * @return Collection|Notification[]
     **/
    public function getAllNotification()
    {
        $userId = Auth::user()->id;
        $data = Notification::where('notif_to_user_id', $userId)->orderBy('created_at', 'ASC')->get();
        return $data;
    }

    /**
     * Get unread notification user.
     * @return Collection|Notification[]
     **/
    public function userNotifUnread(int $limit = 5)
    {
        $userId = Auth::user()->id;
        $data = Notification::where('notif_to_user_id', $userId)->where('is_read', false)->orderBy('created_at', 'ASC')->when($limit > 0, function ($qry) use ($limit) {
            $qry->limit($limit);
        })->get();
        return $data;
    }

    /**
     * Unread count notification
     *
     * @return int
     */
    public function unreadCount()
    {
        $userId = Auth::user()->id;
        $notifUnreadCount = Notification::where('is_read', false)->where('notif_to_user_id', $userId)->count();
        return $notifUnreadCount;
    }

    /* ====================================================== */
    /* $action = 'like' atau 'comment' */
    public function singleNotification(int $userId, int $senderId, string $url = '', int $postId = 0, int $commentId = 0, string $action = 'like')
    {
        try {
            $userSource = Auth::user();
            $jenis = "";
            $titleAction = "";
            $words = "";

            if($postId) $jenis = "postingan";
            if($commentId) $jenis = "komentar";

            if($action == 'like') {
                $titleAction = "Suka";
                $words = 'menyukai';
            }

            if($action == 'comment') {
                $titleAction = "Komentar";
                $words = 'mengomentari';
            }

            $data = array(
                'notif_to_user_id' => $userId,
                'notif_from_user_id' => $senderId,
                'notif_title' => "Employee Forum - $titleAction",
                'notif_description' => $userSource->name . " $words $jenis Anda",
                'link' => $url == '' ? null : $url,
                'created_at' => date('Y-m-d H:i:s')
            );

            Notification::create($data);

            return true;
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
            return false;
        }
    }

    /* $action = 'like' atau 'comment' */
    public function massNotification(array $userIds, int $senderId, string $url = '', int $postId = 0, int $commentId = 0, string $action = 'like')
    {
        try {
            $userSource = Auth::user();
            $jenis = "";
            $data = [];
            $jenis = "";
            $titleAction = "";
            $words = "";

            if($postId) $jenis = "postingan";
            if($commentId) $jenis = "komentar";

            if($action == 'like') {
                $titleAction = "Suka";
                $words = 'menyukai';
            }

            if($action == 'comment') {
                $titleAction = "Komentar";
                $words = 'mengomentari';
            }

            if(count($userIds)) {
                foreach ($userIds as $key => $value) {
                    $temp = array(
                        'notif_to_user_id' => $value,
                        'notif_from_user_id' => $senderId,
                        'notif_title' => "Employee Forum - $titleAction",
                        'notif_description' => $userSource->name . " $words $jenis Anda",
                        'link' => $url == '' ? null : $url,
                        'created_at' => date('Y-m-d H:i:s')
                    );

                    array_push($data, $temp);
                }
            }

            if(count($data)) Notification::insert($data);

            return true;
        } catch (\Throwable $th) {
            //throw $th;
            Log::error($th->getMessage());
            return false;
        }
    }
}
