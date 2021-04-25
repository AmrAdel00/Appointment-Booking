<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $hidden = ['service_id','user_id','created_at','updated_at'];

    protected $guarded = [];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function date()
    {
        return $this->belongsTo(Calendar::class,'booking_date','date');
    }

    public function time()
    {
        return $this->belongsTo(Time::class,'booking_time','time');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
