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

      #Genererer HTML for inhold i timeArray
      public function printTimeArray(){
        foreach ($this -> timeArray as $time){
          echo "<div class='timeSlot ";
          if ($time){
              $timeSlotId = $time -> timeslot_id;
              if (!$time -> tutor_id == 0){
                echo " occupiedTimeSlot' id='$timeSlotId'>";
                echo $time -> tutor_id;
              } else{
                echo " availebleTimeSlot' id='$timeSlotId'>";
              }
              echo "<form method='GET' action='/displayTimeSlot' id='$timeSlotId" . "timeSlotForm" . "'>
                        <input type='hidden' name='timeSlotId' value='$timeSlotId'>
                    </form>";
          } else {
            echo "'>";
              //Gjør sånn at LA kan opprette timeslot her
          }
          echo "</div>";
      }
      }
      
}
