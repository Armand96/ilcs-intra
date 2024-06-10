<?php

namespace App\Traits;

use App\Enums\LinkTypeEnum;
use App\Models\Chat;
use App\Models\Link;
use App\Models\News;
use App\Models\NilaiKaryawan;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait GeneralTrait
{
    /**
     * Get the latest news.
     *
     * @return Collection|News[]
    **/
    public function latestNews(): Collection
    {
        $data = News::orderBy('tgl_event', 'ASC')->limit(3)->get();
        return $data;
    }

    /**
     * Get new employee data.
     *
     * @return Collection|User[]
    **/
    public function newEmployee()
    {
        $users = User::whereBetween('tgl_masuk', [date('Y-m-01'), date('Y-m-t')])->orderBy('tgl_masuk', 'ASC')->get();

        foreach ($users as $key => $reg) {
            if (Storage::disk('public')->exists("profile_picture/" . $reg->image_user)) {
                $reg->image_user = Storage::disk('public')->url('profile_picture/' . $reg->image_user);
            }
        }

        return $users;
    }

    /**
     * Get upcoming birthday employee.
     * @return Collection|User[]
    **/
    public function getUpcomingBirthday()
    {
        $whereMonth = DB::raw('MONTH(tgl_lahir)');
        $wherDate = DB::raw('DAY(tgl_lahir)');
        $currDate = date('d');
        $maxDate = date('t');
        $crossMonth = false;
        $maxRangeDate = "";

        if ($currDate + 5 <= $maxDate) {
            $maxRangeDate = $currDate + 5;
            $crossMonth = false;
        } else {
            $maxRangeDate = $currDate + 5 - $maxDate;
            $crossMonth = true;
        }

        $users = User::where($whereMonth, date('m'))->when($crossMonth, function ($qry) {
            $qry->orWhere('whereMonth', date('m', strtotime('+1 month')));
        })->whereBetween($wherDate, [$currDate, $maxRangeDate])->orderByRaw('DATE_FORMAT(tgl_lahir, "%m-%d") asc')->get();

        foreach ($users as $key => $reg) {
            if (Storage::disk('public')->exists("profile_picture/" . $reg->image_user)) {
                $reg->image_user = Storage::disk('public')->url('profile_picture/' . $reg->image_user);
            }
        }

        return $users;
    }

    public function getAllNilaiKaryawan()
    {
        return NilaiKaryawan::with('karyawan')->where(DB::raw('MONTH(tgl_penilaian)'),  date('m'))->orderBy('nilai', 'ASC')->limit(5)->get();
        // return User::nilaiBulanIni()->orderBy()->limit(5);
    }

    /**
     * Karyawan yang keluar
     *
     * @return Collection|User[]
     */
    public function farewellKaryawan()
    {
        $currentDate = date('Y-m-d');
        $oneWeekFuture = date('Y-m-d', strtotime('+1 week'));
        // dd(User::where('tgl_keluar', [$oneWeekPast, $currentDate])->toSql());
        $users = User::whereBetween('tgl_keluar', [$currentDate, $oneWeekFuture])->get();

        foreach ($users as $key => $reg) {
            if (Storage::disk('public')->exists("profile_picture/" . $reg->image_user)) {
                $reg->image_user = Storage::disk('public')->url('profile_picture/' . $reg->image_user);
            }
        }

        return $users;
    }

    public function appLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::OTHER)->get();
        foreach ($data as $key => $lnk) {
            if (Storage::disk('public')->exists("link_gambar/" . $lnk->image_path)) {
                $lnk->image_path = Storage::disk('public')->url('link_gambar/'.$lnk->image_path);
            }
        }
        return $data;
    }

    public function sosmedLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::SOSMED)->get();
        foreach ($data as $key => $lnk) {
            if (Storage::disk('public')->exists("link_gambar/" . $lnk->image_path)) {
                $lnk->image_path = Storage::disk('public')->url('link_gambar/'.$lnk->image_path);
            }
        }
        return $data;
    }

    /**
     * Get upcoming all notification user.
     * @return Collection|Notification[]
     * @param int $userId
     **/
    public function userNotifAll(int $userId)
    {
        $data = Notification::where('notif_to_user_id', $userId)->orderBy('created_at', 'ASC')->get();
        return $data;
    }

    /**
     * Get unread notification user.
     * @return Collection|Notification[]
     * @param int $userId
     **/
    public function userNotifUnread(int $userId, int $limit = 5)
    {
        $data = Notification::where('notif_to_user_id', $userId)->where('is_read', false)->orderBy('created_at', 'ASC')->when($limit > 0, function ($qry) use ($limit) {
            $qry->limit($limit);
        })->get();
        return $data;
    }

    /**
     * Unread count notification
     *
     * @param  int $userId
     * @return int
     */
    public function unreadCount(int $userId)
    {
        $notifUnreadCount = Notification::where('is_read', false)->where('notif_to_user_id', $userId)->count();
        return $notifUnreadCount;
    }

    /**
     * Chat history to single person
     *
     * @param  int $userIdSender
     * @param  int $userIdReceiver
     * @return Collection|Chat[]
     */
    public function chatHistory(int $userIdSender, int $userIdReceiver)
    {
        $chats = Chat::where('from_user_id', $userIdReceiver)->where('to_user_id', $userIdSender)->orderBy('created_at', 'asc')->get();
        return $chats;
    }

    /**
     * Get all chat limited by $limit.
     * @return Collection|Chat[]
     * @param int $userId
     * @param int $limit
     **/
    public function allUserChat(int $userId, int $limit = 5)
    {
        // Step 1: Get the latest chat IDs for each from_user_id for the specific to_user_id
        $subquery = Chat::select(DB::raw('MAX(id) as id'))
            ->where('to_user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->groupBy('from_user_id');

        // Step 2: Retrieve the chat data using the IDs obtained from the subquery
        $data = Chat::whereIn('id', $subquery)
            ->orderBy('created_at', 'DESC')
            ->when($limit > 0, function ($qry) use ($limit) {
                $qry->limit($limit);
            })->get();
        return $data;
    }

    public function unreadChatCount(int $userId)
    {
        $count = Chat::where('to_user_id', $userId)->where('is_read', false)->count();
        return $count;
    }
}
