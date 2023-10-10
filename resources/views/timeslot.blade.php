<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    #calender{
        display: flex;
        flex-direction: row;
    }
    .day{
        margin-left: 20px;
        height: 50px;
        width: 100px;
    }
    .timeSlot{
        border: solid 1px black;
        height: 50px;
        width: 100px;
    }
    .time{
        height: 50px;
        width: 100px;
    }
    .calenderColumn{
        display:flex; 
        flex-direction: column; 
        width:100px;
        height: auto;
    }
    .occupiedTimeSlot{
        background-color: green;
    }
</style>
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
</body>
</html>
