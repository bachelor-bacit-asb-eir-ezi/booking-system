@extends("layouts.layout")

@section("content")
<?php
    session_start();
    //Bruker GET for laravel gir feilmelding når POST blir brukt
    if (isset($_POST["prevWeek"])){
        $_SESSION["displayedWeek"]-- ;
        // To neste linjene er for å hindre at disse kjøres når siden er refreshet (chat GPT)
        header("Location: timeslot"); 
        exit;
    } elseif(isset($_POST["nextWeek"])){
        $_SESSION["displayedWeek"]++ ;
        header("Location: timeslot"); 
        exit;
    } else {
        #CHAT GPT kode, vet ikke hvorfor men fikset problemet mitt
        if (isset($_SESSION['displayedWeek'])) {
            $displayedWeek = $_SESSION['displayedWeek'];
        } else {
            $displayedWeek = $calendar->displayedWeek; // Default value
        }
    }
    $week = $calender -> getSpesificWeek($_SESSION['displayedWeek']);

?>
<main>
    <b>{{$_SESSION['displayedWeek']}}</b>
    <form method="POST">
        @csrf
        <input type="submit" name="prevWeek" value="previous">
    </form>
    <form method="POST">
        @csrf
        <input type="submit" name="nextWeek" value="next">
    </form>
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
</main>
@endsection