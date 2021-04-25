<?php

namespace App\Models;

use App\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $appends = ['appointments'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getAppointmentsAttribute()
    {
        $times = DB::table('times')->pluck('time')->toArray();
        foreach ($times as $time){
            $appointments[] = new Appointment($this->attributes['id'],$time);
        }
        return $appointments;
    }

}
