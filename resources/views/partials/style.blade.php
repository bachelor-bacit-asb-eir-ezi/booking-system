<style>

    body {
        margin: 0;
        padding-bottom: 100px;
    }
    footer {
        height: 100px;
        background-color: rgba(0, 0, 0, 0.2);
        position: fixed;
        bottom: 0;
        width: 100%;
    }


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

    .multipleTimeSlot{
        background-color: blue;
        overflow: hidden;
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
