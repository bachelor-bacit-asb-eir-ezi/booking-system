<?php
/*
    use App\Models\Day;
    function getWeeksArrayForCurrentYear(){
        $year = Date("Y");
        $startDate = new \DateTime("$year-01-01");
        $weeksArray = array();
        while ($startDate -> format("Y") == $year){
            $weekNumber = $startDate ->format("W");
            $date = $startDate -> format("Y-m-d");
            $dayOfWeek = $startDate->format("l");
            $weeksArray[$weekNumber][] = new Day($dayOfWeek,$date);
            
            $startDate->modify("+1 day");          
        }
        return $weeksArray;
    }

    function getWeeksForYear($year){
        $startDate = new \DateTime("$year-01-01");
        $weeksArray = array();
        while ($startDate -> format("Y") == $year){
            $weekNumber = $startDate ->format("W");
            $date = $startDate -> format("Y-m-d");
            $dayOfWeek = $startDate->format("l");
            $weeksArray[$weekNumber][] = new Day($dayOfWeek,$date);
            
            $startDate->modify("+1 day");          
        }
        return $weeksArray;
    }

    function getDaysInWeak(){
        
    }
    */