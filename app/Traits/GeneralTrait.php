<?php

namespace App\Traits;

use App\Enums\LinkTypeEnum;
use App\Models\CalendarEvent;
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
        $data = News::orderBy('created_at', 'ASC')->where('is_active', true)->limit(3)->get();
        return $data;
    }

    /**
     * Get new employee data.
     *
     * @return Collection|User[]
     **/
    public function newEmployee()
    {
        $users = User::whereBetween('tgl_masuk', [date('Y-m-01'), date('Y-m-t')])->where('is_active', true)->orderBy('tgl_masuk', 'ASC')->get();

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
        // $whereMonth = DB::raw('MONTH(tgl_lahir)');
        // $wherDate = DB::raw('DAY(tgl_lahir)');
        // $currDate = date('d');
        // $maxDate = date('t');
        // $crossMonth = false;
        // $maxRangeDate = "";

        // if ($currDate + 5 <= $maxDate) {
        //     $maxRangeDate = $currDate + 5;
        //     $crossMonth = false;
        // } else {
        //     $maxRangeDate = $currDate + 5 - $maxDate;
        //     $crossMonth = true;
        // }

        // $users = User::where($whereMonth, date('m'))->when($crossMonth, function ($qry) {
        //     $qry->orWhere('whereMonth', date('m', strtotime('+1 month')));
        // })->whereBetween($wherDate, [$currDate, $maxRangeDate])->where('is_active', true)->orderByRaw('DATE_FORMAT(tgl_lahir, "%m-%d") asc')->get();

        $sql = "SELECT *
            FROM users
            WHERE
            (
                (MONTH(tgl_lahir) = MONTH(CURDATE()) AND DAY(tgl_lahir) >= DAY(CURDATE()))
                OR
                (MONTH(tgl_lahir) = MONTH(CURDATE() + INTERVAL 7 DAY) AND DAY(tgl_lahir) <= DAY(CURDATE() + INTERVAL 7 DAY))
            )
            ORDER BY DATE_FORMAT(tgl_lahir, \"%m-%d\") asc";

        $users = DB::select(DB::raw($sql));

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
                $lnk->image_path = Storage::disk('public')->url('link_gambar/' . $lnk->image_path);
            }
        }
        return $data;
    }

    public function sosmedLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::SOSMED)->get();
        foreach ($data as $key => $lnk) {
            if (Storage::disk('public')->exists("link_gambar/" . $lnk->image_path)) {
                $lnk->image_path = Storage::disk('public')->url('link_gambar/' . $lnk->image_path);
            }
        }
        return $data;
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

    public function calendar()
    {
        $calendarEvents = CalendarEvent::select([
            'id', 'judul AS desc', 'tgl_cal_event_start AS start', 'tgl_cal_event_end AS end',
            'description AS text',
            'image_cover',
            DB::raw("CASE WHEN tipe = 'libur' THEN '#D42121' WHEN tipe = 'event' THEN '#37B6E1' ELSE 'grey' END AS color"),
        ])->where(function ($qry) {
            $qry->where('tipe', 'event')->where('tgl_cal_event_start', '>=', date('Y-m-d H:i:s'));
        })->orWhere(function ($qry) {
            $qry->where('tipe', 'libur');
        })->get();
        // dd($calendarEvents);
        return $calendarEvents;
    }

    /* KPI CHART */
    public function kpiChart($filter)
    {
        $sql = "SELECT
            MONTH(CURRENT_DATE) AS month,
            YEAR(CURRENT_DATE) AS year,
            SUM(rkap) AS cumulative_plan,
            SUM(reals) AS cumulative_real,
            plan_this_year,
            real_last_year,
            real_last_year / SUM(reals) AS achieve
        FROM
            k_p_i_charts,
            (SELECT SUM(rkap) AS plan_this_year FROM k_p_i_charts WHERE tahun = YEAR(CURRENT_DATE) AND source = '$filter') AS plan_subquery,
            (SELECT SUM(reals) AS real_last_year FROM k_p_i_charts WHERE tahun = YEAR(CURRENT_DATE) - 1 AND bulan <= MONTH(CURRENT_DATE) AND source = '$filter') AS real_subquery
        WHERE
            tahun = YEAR(CURRENT_DATE)
            AND bulan <= MONTH(CURRENT_DATE) AND source = '$filter'
        GROUP BY
            month, year, plan_this_year, real_last_year";

        $dataKPI = DB::select(DB::raw($sql));
        $data = [
            "data" => [],
            "words" => "",
            "growth" => 0
        ];

        if(count($dataKPI)) {

            $dataKPI = $dataKPI[0];
            $year = date('Y');
            $month = date('F');
            $lastYear = date('Y', strtotime('-1 year'));
            $pembagi = 1000000000;
            $dataCount = [$dataKPI->plan_this_year/$pembagi, $dataKPI->cumulative_plan/$pembagi, $dataKPI->cumulative_real/$pembagi, $dataKPI->real_last_year/$pembagi];

            $data = array(
                'data' => [
                    ["RKAP $year", "RKAP s.d $month $year", "Real s.d $month $year", "Real s.d $month $lastYear"],
                    $dataCount
                ]
            );

            $realValue = number_format($dataKPI->cumulative_real/$pembagi, 2, ",", ".");
            $rkapAchieve = number_format($dataKPI->cumulative_real/$dataKPI->cumulative_plan * 100, 2, ",", ".");
            $growth = (($dataKPI->cumulative_real - $dataKPI->real_last_year)/$dataKPI->real_last_year) * 100;
            $growth = number_format($growth, 2, ",", ".");
            $words = "$filter Rp $realValue M, tercapai $rkapAchieve% RKAP; Growth $growth% YoY";
            $data['words'] = $words;
            $data['growth'] = $growth;
        }

        return $data;
    }

    public function total()
    {
        $sql = "SELECT
            (SELECT SUM( reals ) FROM k_p_i_charts WHERE source = 'ICT System Implementator' OR source = 'IT Manage Service' OR source = 'Digital Seaport') AS total,
            (SELECT SUM( reals ) FROM k_p_i_charts WHERE source = 'ICT System Implementator') AS ict_real,
            (SELECT SUM( reals ) FROM k_p_i_charts WHERE source = 'IT Manage Service') AS it_service,
            (SELECT SUM( reals ) FROM k_p_i_charts WHERE source = 'Digital Seaport') AS digital_seaport
        FROM
            k_p_i_charts
        WHERE
            tahun = YEAR ( CURRENT_DATE )
            AND bulan <= MONTH ( CURRENT_DATE )
        GROUP BY tahun";

        $data = [[],[]];
        $dataKPI = DB::select(DB::raw($sql));
        if(count($dataKPI)) {
            $dt = $dataKPI[0];
            $data = [
                ['IT Manage Service ', 'Digital Seaport', 'ICT Implementor '],
                [
                    $dt->total ? ($dt->it_service / $dt->total * 100) : 0,
                    $dt->total ? ($dt->digital_seaport / $dt->total * 100) : 0,
                    $dt->total ? ($dt->ict_real / $dt->total * 100) : 0
                ]
            ];
            // dd($data);
        }
        return $data;
    }
}
