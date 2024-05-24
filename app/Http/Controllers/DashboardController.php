<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use GeneralTrait;

    public function home()
    {
        $data = array(
            'news' => $this->latestNews(),
            'eom' => $this->getAllNilaiKaryawan(),
            'upcomingBirthday' => $this->getUpcomingBirthday(),
            'linkApps' => $this->appLink(),
            'linkSosmed' => $this->sosmedLink(),
            'newEmployee' => $this->newEmployee(),
            'farewellEmployee' => $this->farewellKaryawan(),
            'notifCount' => $this->unreadCount(1),
            'chatHist' => $this->allUserChat(1),
            'chatCount' => $this->unreadCount(1),
        );

        return view('dashboard', compact('data'));
    }

    public function leader()
    {
        // Retrieve all leaders grouped by divisi
        $groupedLeaders = Leader::all()->groupBy('divisi');

        // Iterate through the grouped collection
        foreach ($groupedLeaders as $divisi => $leaders) {
            // echo "Divisi: " . $divisi . "\n";
            foreach ($leaders as $leader) {
                // echo "User ID: " . $leader->user_id . ", Description: " . $leader->description . "\n";
            }
        }
        return response()->json($groupedLeaders);
    }
}
