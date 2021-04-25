<?php


namespace App;

use App\Models\Booking;
use App\Models\Calendar;

class Appointment
{

    private $service;

    public $time;

    public $days;

    private $day;

    public function __construct($service,$time)
    {
        $this->service = $service;
        $this->time = $time;

        $calendars = Calendar::whereBetween('date',[now()->format('Y-m-d'),now()->addWeek()->format('Y-m-d')])->get();
        foreach ($calendars as $calendar){
                $this->day = [
                    'date' => $calendar->date,
                    'day_name' => $calendar->day_name,
                    'day' => $calendar->day,
                    'month_name' => $calendar->month_name,
                    'month' => $calendar->month,
                    'available' => $this->checkBooking($calendar->date)
                ];
                $this->days[] = $this->day;
        }
    }

    private function checkBooking($bookingDate)
    {
        $booking = Booking::where('service_id',$this->service)
            ->where('booking_date',$bookingDate)
            ->where('booking_time',$this->time)
            ->first();
        if($booking){
            return false;
        }else {
            return true;
        }
    }
}
