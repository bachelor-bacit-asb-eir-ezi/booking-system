@extends("layouts.layout")

@section("content")
    <b>{{$week -> getWeekNumber()}}</b>
    <div class="d-flex justify-content-center">
        <form method="POST" action="/timeslot" class="mx-5 mb-3">
            @csrf
            <input type="hidden" name="weekNumber" value="{{$week -> getWeekNumber()}}">
            <input type="hidden" name="changeWeek" value="prevWeek">
            <input type="submit" name="prevWeek" value="previous">
        </form>
        <form method="POST" action="/timeslot" class="mx-5 mb-3">
            @csrf
            <label for="weekNumber"> Søk etter uke: </label>
            <input type="int" name="weekNumber">
            <input type="hidden" name="changeWeek" value="searchWeek">
            <input type="submit" value="Søk">
        </form>
        <form method="POST" action="/timeslot" class="mx-5 mb-3">
            @csrf
            <input type="hidden" name="weekNumber" value="{{$week -> getWeekNumber()}}">
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
            @if($time)
                @if($time -> booked_by == null)
                    <div id="{{$time -> timeslot_id}}" class="timeSlotStyle timeSlot availebleTimeSlot">
                    
                @else
                    <div id="{{$time -> timeslot_id}}" class="timeSlotStyle timeSlot occupiedTimeSlot">
                    
                @endif
                    <form method='GET' action='/displayTimeSlot' id='{{$time -> timeslot_id}}timeSlotForm'>
                        <input type='hidden' name='timeSlotId' value='{{$time -> timeslot_id}}'>
                    </form>
                </div>
            @else
                <div class="timeSlotStyle">
                </div>           
            @endif
            @endforeach
        </div>
        @endforeach
        <?php 
        ?>
    </div>
</main>
<script>
    $(".timeSlot").click(function(){
        $("#" + this.id + ">#" +this.id+"timeSlotForm").submit();
    });
</script>
@endsection