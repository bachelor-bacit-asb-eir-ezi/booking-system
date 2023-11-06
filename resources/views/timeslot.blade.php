@extends("layouts.layout")

@section("content")
<!-- -->
    <b>{{$week -> getWeekNumber()}}</b>
    <div class="d-flex justify-content-center">
        <form method="POST" action="/timeslot" class="mx-5 mb-3">
            @csrf
            <input type="hidden" name="weekNumber" value="{{$week -> getWeekNumber()}}">
            <input type="hidden" name="year" value="{{$week -> getYear()}}">
            <input type="hidden" name="changeWeek" value="prevWeek">
            <input type="submit" name="prevWeek" value="previous">
        </form>
        <form method="POST" action="/timeslot" class="mx-5 mb-3">
            @csrf
            <label for="weekNumber"> Søk etter uke: </label>
            <input type="int" name="weekNumber" min="1" max="52">
            <input type="hidden" name="year" value="{{$week -> getYear()}}">
            <input type="hidden" name="changeWeek" value="searchWeek">
            <input type="submit" value="Søk">
        </form>
        <form method="POST" action="/timeslot" class="mx-5 mb-3">
            @csrf
            <input type="hidden" name="weekNumber" value="{{$week -> getWeekNumber()}}">
            <input type="hidden" name="year" value="{{$week -> getYear()}}">
            <input type="hidden" name="changeWeek" value="nextWeek">
            <input type="submit" value="next">
        </form>
    </div>
    <div id='calender'>
        <div class="calendercolumn">
            <div class="day"></div>
            <?php 
                for ($i = 7; $i < 24; $i++){
                    if ($i < 10){
                        echo "<div class='time'>0$i:00</div>";
                    } else {
                        echo "<div class='time'>$i:00</div>";
                    }
                }
            ?>
        </div>
        @foreach ($week -> getDaysInWeek() as $day)
        <div class='calenderColumn'>
            <div class='day'> 
                {{$day -> getDayName()}} <br> 
                {{$day -> getDate()}}<br>
            </div>
            @foreach($day -> timeArray as $time)
                <!-- sjekker om flere veildeningstimer i samme time og dag, eller tom-->
                @switch (count($time))
                    @case (0)
                        <!-- Tom time -->
                        <div class="timeSlotStyle">
                        @break
                    @case (1)
                        <!-- En veiledningstime -->
                        @if ($time[0] -> booked_by != null) <!-- Booket time -->
                            <div id="{{$time[0] -> timeslot_id}}" class="timeSlotStyle timeSlot occupiedTimeSlot">
                        @else <!-- Ledig time -->
                            <div id="{{$time[0] -> timeslot_id}}" class="timeSlotStyle timeSlot availebleTimeSlot">
                        @endif
                        <form method='GET' action='/displayTimeSlot' id='{{$time[0] -> timeslot_id}}timeSlotForm'>
                                <input type='hidden' name='timeSlotId' value='{{$time[0] -> timeslot_id}}'>
                        </form>
                        @break
                    @default
                        <!-- flere veiledningstimer -->
                        <div class="timeSlotStyle multipleTimeSlot">
                            <form method='GET' action='/displayTimeSlot'>
                            <select name="timeSlotId">
                        @foreach ($time as $timeSlot)
                            @if ($timeSlot -> booked_by != null)  <!-- Booket time -->
                                <option class="occupiedTimeSlot" value="{{$timeSlot -> timeslot_id}}">
                            @else <!-- Ledig time -->
                                <option class="availebleTimeSlot" value="{{$timeSlot -> timeslot_id}}">
                            @endif
                                    {{$timeSlot -> tutor_id}}: {{$timeSlot -> description}}
                                </option>
                        @endforeach
                            </select>
                            <input type="submit" value="Vis valgte">
                            </form>
                        @break
                    @endswitch
                        </div>
            <!--Time Slot ikke eksisterer gjør dette -->
            @endforeach
        </div>
        @endforeach
    </div>
</main>
<script>
    //Gjør timeSlot i kalender klikkbare
    $(".timeSlot").click(function(){
        $("#" +this.id+"timeSlotForm").submit();
    });
</script>
@endsection