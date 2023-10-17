<?php

namespace App\Models;

use function PHPUnit\Framework\isNull;

class Day
{
    private $dayName;
    private $date;
    public $timeArray; 

    function __construct($dayName,$date) {
        $this->dayName = $dayName;
        $this->date = $date;
        $this->timeArray = $this->fillTimeArray();
      }
    
      #Fyller timeArray med key/value pair der key er klokkeslett og value er null
      private function fillTimeArray(){
        for($i = 7; $i < 24; $i++){
          $j = strval($i);
          if ($i < 10){
            $keyVal = "0".$j.":00:00";
            $timeArray[$keyVal] = null;
          } else{
            $keyVal = $j.":00:00";
            $timeArray[$keyVal] = null;
          }
        }
        return $timeArray;
      }

      public function getDayName(){
        return $this->dayName;
      }

      public function getDate(){
        return $this->date;
      }
}
