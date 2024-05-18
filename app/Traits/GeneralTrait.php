<?php

namespace App\Traits;

use App\Enums\LinkTypeEnum;
use App\Models\Link;
use App\Models\News;
use App\Models\NilaiKaryawan;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

trait GeneralTrait
{
    /**
     * Get the latest news.
     *
     * @return Collection|News[]
    **/
    public function latestNews(): Collection
    {
        $data = News::orderBy('tgl_event', 'ASC')->limit(5)->get();
        return $data;
    }

    /**
     * Get new employee data.
     *
     * @return Collection|User[]
    **/
    public function newEmployee()
    {
        $data = User::whereBetween('tgl_masuk', [date('Y-m-d'), date('Y-m-t')])->orderBy('tgl_masuk', 'ASC')->limit(5)->get();
        return $data;
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

        return User::where($whereMonth, date('m'))->when($crossMonth, function ($qry) {
            $qry->orWhere('whereMonth', date('m', strtotime('+1 month')));
        })->whereBetween($wherDate, [$currDate, $maxRangeDate])->orderBy('tgl_lahir', 'ASC')->limit(5)->get();
    }

    public function getAllNilaiKaryawan()
    {
        return NilaiKaryawan::with('karyawan')->where(DB::raw('MONTH(tgl_penilaian)'),  date('m'))->orderBy('nilai', 'ASC')->limit(5)->get();
        // return User::nilaiBulanIni()->orderBy()->limit(5);
    }

    public function appLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::OTHER)->get();
        return $data;
    }

    public function sosmedLink()
    {
        $data = Link::where('tipe', LinkTypeEnum::SOSMED)->get();
        return $data;
    }
}
