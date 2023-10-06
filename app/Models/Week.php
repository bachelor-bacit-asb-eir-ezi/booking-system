<?php

namespace App\Models;

use App\Models\Day;

require __DIR__ . "/repetingFuncs.php";
class Week
{
    private $weekNumber;
    private $year; //For å finne ut hvilket år uken tilhører
    private $daysInWeek;

    function __construct($weekNumber,$year)
    {
        $this->weekNumber = $weekNumber;
        $this->year = $year;
        $this->daysInWeek = $this->fillListByWeekNumber($weekNumber);
    }

    private function fillListByWeekNumber($weekNumber){
        $days = array();
        //Finn første dag i uka
        $firstDayOfWeek = $this -> getFirstDateOfWeek($weekNumber);
        // Loop through the dates +6 (7 days total)
        $dayNameArray = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        for ($i = 0; $i < 7; $i++) {
            $days[] = new Day($dayNameArray[$i], $firstDayOfWeek->format('Y-m-d'));
            $firstDayOfWeek->modify("+1 day");
        }
        //returner liste
        return $days;
    }

    public function getWeekNumber(){
        return $this->weekNumber;
    }

    public function getDaysInWeek(){
        return $this->daysInWeek;
    }

    public function getDayInWeekByDate($date){
        $days = $this ->daysInWeek;
        foreach($days as $day){
            if ($day -> getDate() == $date){
                return $day;
            }
        }
    }
    
    
    private function getFirstDateOfWeek($weekNumber){ 
        $dateTime = new \DateTime();  
        $dateTime->setISODate($this->year, $weekNumber); 
        return $dateTime;
    }


    public function printWeekInfo(){
        foreach ($this -> getDaysInWeek() as $day){
            $dayName = $day -> getDayName();
            $date = $day -> getDate();
            echo "<div class='calenderColumn'><div class='day'> $dayName <br> $date<br></div>";
            $day -> printTimeArray();
            echo "</div>";
        }
    }

    public function insertTimeSlots($timeSlots){
            foreach($timeSlots as $timeSlot){
                $timeSlotTime = $timeSlot -> start_time;
                $timeSlotDate = $timeSlot -> date;

                $day = $this -> getDayInWeekByDate($timeSlotDate);
                $date = $day -> getDate();
                

                if ($timeSlotDate == $date){
                    $day -> timeArray[$timeSlotTime] = $timeSlot;
                }
            }
    }
}
