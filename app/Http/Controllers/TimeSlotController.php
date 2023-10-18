<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Exceptions\InvalidOrderException;
use App\Models\Week;
use DateTime;

class TimeSlotController extends Controller
{

    public function index(Request $request){
        switch ($request -> input("changeWeek")) {
            case "nextWeek":
                $weekNumber = $request -> input("weekNumber");
                $weekNumber++;
              break;
            case "prevWeek":
                $weekNumber = $request -> input("weekNumber");
                $weekNumber--;
              break;
            case "searchWeek":
                $weekNumber = $request -> input("weekNumber");
              break;
            default:
                $weekNumber = date("W");
                break;
          }
        $week = new Week($weekNumber,2023);
        $timeSlots = TimeSlot::all();
        $week -> insertTimeSlots($timeSlots);
        return view("timeslot",[
            "week" => $week,
        ]);
    }

    public function displayTimeSlot(Request $request){
        
        $timeSlot = TimeSlot::where("timeslot_id",$request -> input("timeSlotId")) -> get();
        return view("displayTimeSlot",[
            "timeSlot" => $timeSlot,
        ]);
    }
    
    public function bookTimeSlot(Request $request){
        //brukes som mock til login er fikset
        $userID = 1;
        TimeSlot::where("timeslot_id", $request -> input("timeSlotId")) -> update(["booked_by" => $userID]);
        return redirect("timeslot");
    }

    public function unBookTimeSlot(Request $request){
        TimeSlot::where("timeslot_id", $request -> input("timeSlotId")) -> update(["booked_by" => null]);
        return redirect("timeslot");
    }
}
