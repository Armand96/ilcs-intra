<?php

namespace App\Http\Controllers;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use GeneralTrait;

    public function home()
    {
        $news = $this->latestNews();
        $eom = $this->getAllNilaiKaryawan();
        $upcomingBirthday = $this->getUpcomingBirthday();
        $linkApps = $this->appLink();
        $linkSosmed = $this->sosmedLink();

        return view('dashboard');
    }
}
