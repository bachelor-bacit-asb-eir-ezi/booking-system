@extends("layouts.layout")

@section("content")
<div>
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
    <?php 
    
        $week -> printWeekInfo();
    ?>
    </div>
@endsection