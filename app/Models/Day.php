<?php

namespace App\Models;

use function PHPUnit\Framework\isNull;

/**
 * Day klassen inneholder informajsonen om hver enkelt dag som applikasjonen trenger
 * 
 * @see denne funksjonen er sterkt tilknyttet Week klassen, og timeslot siden det er inne i denne funksjonen TimeSlot blir lagret
 * 
 * @param dayName er ukedagen til dagen (eksempel: mandag, tirsdag osv...)
 * @param date er datoen til dagen (eksempel: 2023.10.05)
 * 
 */

class Day
{
  #bruker private på dayname of date siden disse skal ikke kunne bli endret etter at Day objekt er lagt
    private $dayName;
    private $date;
    public $timeArray; 

    function __construct($dayName,$date) {
        $this->dayName = $dayName;
        $this->date = $date;
        $this->timeArray = $this->fillTimeArray();
      }
    
      #Fyller timeArray med key/value pair der key er klokkeslett og value er null
      private function fillTimeArray(){ //private fordi denne skal bare kjøres en gan av constructor
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
