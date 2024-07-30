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
            'news' => $this->latestNews(),
            'upcomingBirthday' => $this->getUpcomingBirthday(),
            'linkApps' => $this->appLink(),
            'linkSosmed' => $this->sosmedLink(),
            'newEmployee' => $this->newEmployee(),
            'farewellEmployee' => $this->farewellKaryawan(),
            'calendar' => $this->calendar(),
            'pendapatanChart' => $this->kpiChartV2('Pendapatan'),
            'bebanChart' => $this->kpiChartV2('Beban Usaha'),
            // 'Chart' => $this->kpiChartV2('Beban Usaha'),
            'ictChart' => $this->kpiChartV2('ICT System Implementator'),
            // 'ictChart' => $this->kpiChart('ICT System Implementator'),
            'itChart' => $this->kpiChartV2('IT Manage Service'),
            'digitalChart' => $this->kpiChartV2('Digital Seaport'),
            'totalChart' => $this->totalV2(),
            // 'notifCount' => $this->unreadCount(1),
            // 'chatHist' => $this->allUserChat(1),
            // 'chatCount' => $this->unreadCount(1),
        );

        $orChart = [ "data" => [] ];

        if(count($data['bebanChart']['data'])) {
            foreach ($data['bebanChart']['data'][1] as $key => $value) {
                $percentage = number_format($value / $data['pendapatanChart']['data'][1][$key] * 100, 2);
                array_push($orChart['data'], $percentage);
            }
        }

        $data['orChart'] = $orChart;

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
}
