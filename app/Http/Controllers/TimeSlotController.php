<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use App\Models\Calender;
use Illuminate\Support\Facades\DB;
use App\Exceptions\InvalidOrderException;

class TimeSlotController extends Controller
{

    public function index(){
        $timeSlots = TimeSlot::all();
        $calender = new Calender(2023,"Scrooge");
        $calender -> fillWeeksWithTimeslots($timeSlots);
        return view("timeslot",[
            "calender" => $calender,
        ]);
    }

    public function displayTimeSlot(Request $request){
        
        $timeSlot = DB::table("time_slots") -> where("timeslot_id",$request -> input("timeSlotId")) -> get();
        return view("displayTimeSlot",["timeSlot" => $timeSlot]);
    }
    
    public function bookTimeSlot(Request $request){
        //brukes som mock til login er fikset
        $userID = 1;

        TimeSlot::where("timeslot_id", $request->input("timeSlotId"))->update(["booked_by" => $userID]);

        return redirect()->action([TimeSlotController::class, 'index']);;
    }
}
