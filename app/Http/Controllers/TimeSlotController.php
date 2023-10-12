<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Models\Calender;

class TimeSlotController extends Controller
{
    public function index(){
        $timeSlots = TimeSlot::all();
        $calender = new Calender(2023,"Scrooge");
        $calender -> fillWeeksWithTimeslots($timeSlots);
        return view('timeslot',[
            "calender" => $calender,
        ]);
    }
}
