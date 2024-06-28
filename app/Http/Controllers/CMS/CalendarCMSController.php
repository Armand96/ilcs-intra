<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\CalendarEvent;
use App\Models\MeetingAttendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class CalendarCMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = CalendarEvent::query();

        if ($request->filled('judul')) {
            $query->where('judul', 'like', '%' . $request->judul . '%');
        }

        if ($request->filled('tgl_cal_event_start')) {
            $query->where('tgl_cal_event_start', '>=', $request->tgl_cal_event_start);
        }

        if ($request->filled('tgl_cal_event_end')) {
            $query->where('tgl_cal_event_end', '<=', $request->tgl_cal_event_end);
        }

        $calendarEvents = $query->select([
            'id', 'judul AS title', 'tgl_cal_event_start AS start', 'tgl_cal_event_end AS end', 'description AS desc',
            DB::raw("CASE WHEN tipe = 'libur' THEN '#D42121' WHEN tipe = 'event' THEN '#37B6E1' ELSE 'grey' END AS color"),
        ])->whereIn('event', ['libur', 'event'])->get();

        return view('cms.pages.calendar', compact('calendarEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $request->validate([
                'judul' => 'required',
                'tgl_cal_event_start' => 'required',
                'tgl_cal_event_end' => 'required',
                'location' => 'required',
                'tipe' => 'required',
            ]);

            $data = $request->only([
                'judul',
                'description',
                'tgl_cal_event_start',
                'tgl_cal_event_end',
                'tipe',
                'location',
                'attendees'
            ]);

            if ($request->hasFile('foto')) {
                $fileName = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/calendar_event/', $fileName);
                $data['image_cover'] = $fileName;
            }

            /* CROSS TABLE INSERT */
            DB::beginTransaction();

            $data['tgl_cal_event_start'] = date('Y-m-d H:i:s', strtotime($data['tgl_cal_event_start']));
            $data['tgl_cal_event_end'] = date('Y-m-d H:i:s', strtotime($data['tgl_cal_event_end']));

            $calendar = CalendarEvent::create($data);

            $attendees = isset($data['attendees']) ? $data['attendees'] : [];

            if (count($attendees)) {
                $insertAttendees = [];
                foreach ($attendees as $key => $value) {
                    $temp = array(
                        'calendar_event_id' => $calendar->id,
                        'user_id' => $value,
                        'created_at' => date('Y-m-d H:i:s')
                    );

                    array_push($insertAttendees, $temp);
                }

                MeetingAttendee::insert($insertAttendees);
            }

            DB::commit();
            return redirect()->back()->with(['notif' => 'Calendar Event telah dibuat']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarEvent $calendar)
    {
        $calendar->load('attendee');
        return response()->json($calendar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalendarEvent $calendar)
    {
        $request->validate([
            'judul' => 'required',
            'tgl_cal_event_start' => 'required',
            'tgl_cal_event_end' => 'required',
            'location' => 'required',
            'tipe' => 'required',
        ]);

        $data = $request->only([
            'judul',
            'description',
            'tgl_cal_event_start',
            'tgl_cal_event_end',
            'location',
            'tipe'
        ]);

        try {
            if ($request->hasFile('foto')) {

                $isExist = Storage::disk('public')->exists("calendar_event/$calendar->image_cover") ?? false;
                if ($isExist) Storage::delete("public/calendar_event/$calendar->image_cover");

                $filePath = time() . '.' . $request->foto->extension();
                $request->foto->storeAs('public/calendar_event/', $filePath);
                $data['image_cover'] = $filePath;
            }

            /* CROSS TABLE INSERT */
            DB::beginTransaction();

            $data['tgl_cal_event_start'] = date('Y-m-d H:i:s', strtotime($data['tgl_cal_event_start']));
            $data['tgl_cal_event_end'] = date('Y-m-d H:i:s', strtotime($data['tgl_cal_event_end']));

            $calendar->update($data);

            $attendees = isset($data['attendees']) ? $data['attendees'] : [];

            if (count($attendees)) {
                MeetingAttendee::where('calendar_event_id', $calendar->id)->delete();
                $insertAttendees = [];
                foreach ($attendees as $key => $value) {
                    $temp = array(
                        'calendar_event_id' => $calendar->id,
                        'user_id' => $value,
                        'created_at' => date('Y-m-d H:i:s')
                    );

                    array_push($insertAttendees, $temp);
                }

                MeetingAttendee::insert($insertAttendees);
            }

            DB::commit();
            return redirect()->back()->with(['notif' => 'Calendar Event telah diupdate']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['errors' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarEvent $calendar)
    {
        try {
            if ($calendar->image_cover != null) {

                Storage::disk('public')->exists("calendar_event/$calendar->image_cover");
                Storage::delete("public/calendar_event/$calendar->image_cover");
            }

            DB::beginTransaction();
            MeetingAttendee::where('calendar_event_id', $calendar->id)->delete();
            $calendar->delete();
            DB::commit();

            return redirect()->back()->with(['notif' => 'Calendar Event telah dihapus']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }

    /* =============================================================== */
    public function deleteMultipleAttendee(Request $request)
    {
        $request->validate([
            'calendar_event_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->only([
            'calendar_event_id',
            'user_id',
        ]);

        try {
            MeetingAttendee::where('calendar_event_id', $data['calendar'])->whereIn('user_id', $data['user_id'])->delete();
            return response()->json(['notif' => 'attendee berhasil dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }

    public function insertMultipleAttendee(Request $request)
    {
        $request->validate([
            'calendar_event_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->only([
            'calendar_event_id',
            'user_id',
        ]);

        try {

            if (count($data['user_id'])) {
                $insertAttendees = [];
                foreach ($data['user_id'] as $key => $value) {
                    $temp = array(
                        'calendar_event_id' => $data['calendar_event_id'],
                        'user_id' => $value,
                        'created_at' => date('Y-m-d H:i:s')
                    );

                    array_push($insertAttendees, $temp);
                }

                MeetingAttendee::insert($insertAttendees);
            }

            return response()->json(['notif' => 'attendee berhasil ditambahkan']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['notif' => $th->getMessage()]);
        }
    }
}
