<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap og jquery-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
    <title>Document</title>
</head>
<body>
<style>

    #calender{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .day{
        margin-left: 20px;
        height: 50px;
        width: 100px;
    }
    .timeSlotStyle{
        border: solid 1px black;
        height: 50px;
        width: 100px;
    }
    .time{
        height: 50px;
        width: 100px;
        text-align: center;
        border: solid 1px black;
    }
    .calenderColumn{
        display:flex; 
        flex-direction: column; 
    }
    .occupiedTimeSlot{
        background-color: yellow;
    }
    .availebleTimeSlot{
        background-color: green;
    }

    #infoTimeSlot{
        position: absolute;
        height: 500px;
        width: 500px;
        border: solid black 2px;
        background-color: white;
        top: 0;
        display: none;
    }
</style>
    @yield("content")
</body>
</html>
