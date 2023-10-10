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
        $weeks = $calender -> getWeeksList();
        //$weekNumbers = array_keys($weeks);
        $displayedWeek = 40;
        $week = $calender -> getSpesificWeek($displayedWeek);
        $week -> insertTimeSlots($timeSlots);
    
        return view('timeslot',[
            "week" => $week,
        ]);
    }
}
