<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Models\Week;

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

    #Sender bruket til createTimeSlot view
    public function createTimeSlot(){
        return view("createTimeSlot");
    }

    #Sender create time slot til database
    public function submitTimeSlot(Request $request){
        $tutorId = 1;

        $date = sanitize($request -> input("date"));
        $startTime = sanitize($request -> input("startTime"));
        $endTime = sanitize($request -> input("endTime"));
        $description = sanitize($request -> input("description"));

        TimeSlot::create(["tutor_id" => $tutorId, "date" => $date, "start_time" => $startTime, "end_time" => $endTime, "description" => $description]);

        return redirect("timeslot");
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

function sanitize($text){
    $text = strip_tags($text);
    $text = htmlspecialchars($text);
    return $text;
}