<?php

namespace App\Models;

use App\Models\Week;

/**
 * 
 */

class Calender
{
    private $year;
    private $tutor; //Gjør ikke nooe for øyeblikket, skal brukes for å filtrere basert på LA
    private $weeks;
    public $displayedWeek;

    public function __construct($year,$tutor){
        $this -> year = $year;
        $this -> tutor = $tutor;
        $this -> weeks = $this -> getWeeksArrayForEntireYear($year);
        $this -> displayedWeek = date("w");
    }

    private function getWeeksArrayForEntireYear($year){
        $weeksArray = array();
        for ($i = 1; $i<=52; $i++){
            $weeksArray[$i] = new Week($i,$year);
        }
        return $weeksArray;
    }
    
    #Henter matrisen som inneholder alle uker
    public function getWeeksList(){
        
        return $this -> weeks;
    }

    #Henter en uke basert på uke nummer
    public function getSpecificWeek($weekNumber){
        return $this -> weeks[$weekNumber];
    }

    public function fillWeeksWithTimeslots($timeSlots){
        foreach($this -> weeks as $week){
            $week -> insertTimeSlots($timeSlots);
        }
    }

}
