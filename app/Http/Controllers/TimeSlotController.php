<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;

class TimeSlotController extends Controller
{
    public function index(){
        $timeSlots = TimeSlot::all();
        return view('timeslot',[
            "timeSlots" => $timeSlots,
        ]);
    }
}
