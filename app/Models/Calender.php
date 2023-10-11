<?php

namespace App\Models;

use App\Models\Week;

/**
 * 
 */

class Calender
{
    private $year;
    private $tutor;
    private $weeks;

    function __construct($year,$tutor){
        $this -> year = $year;
        $this -> tutor = $tutor;
        $this -> weeks = $this -> getWeeksArrayForEntireYear($year);
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
    public function getSpesificWeek($weekNumber){
        return $this -> weeks[$weekNumber];
    }

}
