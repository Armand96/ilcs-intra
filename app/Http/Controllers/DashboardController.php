<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    use GeneralTrait;

    public function home()
    {
        $data = array(
            // 'news' => $this->latestNews(),
            // 'eom' => $this->getAllNilaiKaryawan(),
            'upcomingBirthday' => $this->getUpcomingBirthday(),
            'linkApps' => $this->appLink(),
            'linkSosmed' => $this->sosmedLink(),
            'newEmployee' => $this->newEmployee(),
            'farewellEmployee' => $this->farewellKaryawan(),
            // 'notifCount' => $this->unreadCount(1),
            // 'chatHist' => $this->allUserChat(1),
            // 'chatCount' => $this->unreadCount(1),
        );

        return view('intranet.pages.dashboard', compact('data'));
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

    public function apiRedirect(Request $request)
    {
        $nip = $request->get('nip');
        $username = $request->get('username');

        // dd($nip, $username);

        $user = User::when($nip != null && $nip != '', function ($qry) use ($nip) {
            $qry->where('nip', $nip);
        })->when($username != null && $username != '', function ($qry) use ($username) {
            $qry->where('username', $username);
        })->first();

        if ($user) {
            Auth::loginUsingId($user->id);
            // dd(Auth::user());
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->withErrors(['msg' => 'NIP tidak ditemukan']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
