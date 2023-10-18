<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $fillable = ["tutor_id", "date", "start_time", "end_time", "location", "description", "booked_by"];
}
