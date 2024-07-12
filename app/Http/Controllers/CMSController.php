<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use App\Models\News;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function index()
    {
        $data = [
            'user' => $this->totalUsers(),
            'news' => $this->totalNews(),
            'post' => $this->totalPosts(),
            'event' => $this->totalEventsThisYear()
        ];
        // dd($data);

        return view('cms.pages.home', compact('data'));
    }

    public function totalUsers()
    {
        $activeUsers = User::where('is_active', true)->count();
        $inactiveUsers = User::where('is_active', false)->count();
        $total = $activeUsers + $inactiveUsers;

        $data = [
            'active' => $activeUsers,
            'inactive' => $inactiveUsers,
            'total' => $total
        ];

        return $data;
    }

    public function totalNews()
    {
        $activeNews = News::where('is_active', true)->whereYear('created_at', date('Y'))->count();
        $inactiveNews = News::where('is_active', false)->whereYear('created_at', date('Y'))->count();
        $total = $activeNews + $inactiveNews;

        $data = [
            'active' => $activeNews,
            'inactive' => $inactiveNews,
            'total' => $total
        ];

        return $data;
    }

    public function totalPosts()
    {
        return Post::whereYear('created_at', date('Y'))->count();
    }

    public function totalEventsThisYear()
    {
        return CalendarEvent::whereYear('tgl_cal_event_start', date('Y'))->count();
    }
}
