<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'description',
        'tgl_cal_event_start',
        'tgl_cal_event_end',
        'tipe',
    ];

    public function attendee()
    {
        return $this->hasMany(MeetingAttendee::class, 'calendar_event_id', 'id');
    }
}
