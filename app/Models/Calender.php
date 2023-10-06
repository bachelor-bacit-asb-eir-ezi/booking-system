<?php

namespace App\Models;

use App\Models\Week;
require __DIR__ . "/repetingFuncs.php";

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

    function getWeeksArrayForEntireYear($year){
        $weeksArray = array();
        for ($i = 1; $i<=52; $i++){
            $weeksArray[$i] = new Week($i,$year);
        }
        return $weeksArray;
    }
    
    public function getWeeksList(){
        
        return $this -> weeks;
    }

    public function getSpesificWeek($weekNumber){
        return $this -> weeks[$weekNumber];
    }

}
