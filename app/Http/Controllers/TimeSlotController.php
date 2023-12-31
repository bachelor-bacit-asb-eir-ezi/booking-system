<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Models\Week;
use Illuminate\Support\Facades\Auth;
use App\Models\tools\InputCheck;


class TimeSlotController extends Controller
{

    public function index(Request $request){
        $year = $request -> input("year");
        switch ($request -> input("changeWeek")) {
            case "nextWeek":
                $weekNumber = $request -> input("weekNumber");
                $weekNumber++;
                if ($weekNumber > 52){
                    $year ++;
                    $weekNumber = 1;
                }
                break;
            case "prevWeek":
                $weekNumber = $request -> input("weekNumber");
                $weekNumber--;
                if ($weekNumber < 1){
                    $year --;
                    $weekNumber = 52;
                }
                break;
            case "searchWeek":
                #for å forhindre at bruker kan søke på ukenummer høyere en mulig eller lavere (0 < weekNumber < 53)
                switch ($weekNumber = $request -> input("weekNumber")){
                    case $weekNumber < 1:
                        $weekNumber = 1;
                        break;
                    case $weekNumber > 52:
                        $weekNumber = 52;
                        break;
                    default:
                        $weekNumber = $request -> input("weekNumber");
                        break;
                }
                break;
            default:
                $weekNumber = date("W");
                $year = date("Y");
                break;
        }
        $week = new Week($weekNumber,$year);
        $timeSlots = TimeSlot::all();
        $week -> insertTimeSlots($timeSlots);
        return view("timeslot",[
            "week" => $week,
        ]);
    }

    public function tableView(){
        $timeSlots = TimeSlot::orderBy("date") -> orderBy("start_time") -> get();
        return view("timeSlotTableView", [
            "timeSlots" => $timeSlots,
        ]);
    }

    #Sender bruket til createTimeSlot view
    public function create(){
        //bare la og lærer skal kunne bruke denne
        return view("createTimeSlot");
    }

    #Sender create time slot til database
    public function submitTimeSlot(Request $request){
        $tutorId = 1;

        $date = InputCheck::sanitize($request -> input("date"));
        $startTime = InputCheck::sanitize($request -> input("startTime"));
        $endTime = date('h:i:s', strtotime($startTime)+3600);
        $location = InputCheck::sanitize($request -> input("location"));
        $description = InputCheck::sanitize($request -> input("description"));

        TimeSlot::create(["tutor_id" => $tutorId, "date" => $date,
                            "start_time" => $startTime, "end_time" => $endTime,
                            "location" => $location, "description" => $description]);

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
        //bare bruker som har booket timen skal kunne unbooke den timen
        TimeSlot::where("timeslot_id", $request -> input("timeSlotId")) -> update(["booked_by" => null]);
        return redirect("timeslot");
    }
}