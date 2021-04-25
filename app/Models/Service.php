<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $appends = ['calendar'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getCalendarAttribute()
    {
        return '';
    }

    private function checkBooking($bookingDate,$bookingTime)
    {
        $booking = Booking::where('service_id',$this->attributes['id'])
                ->where('booking_date',$bookingDate)
                ->where('booking_time',$bookingTime)
                ->first();
        if($booking){
            return false;
        }else {
            return true;
        }
    }

}
