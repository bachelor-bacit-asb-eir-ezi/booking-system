<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <?php
        use App\Models\Calender;
        $calender = new Calender(2023,"Scrooge");
        $weeks = $calender -> getWeeksList();
        $weekNumbers = array_keys($weeks);
        
        $displayedWeek = 40;
        $week = $calender -> getSpesificWeek($displayedWeek);
       
        print_r($week);
    ?>
    <table >
        <colgroup>
            <col style="width: 100px; background-color: lightblue;">
            <col style="width: 150px; background-color: lightgreen;">
            <col style="width: 80px; background-color: lightpink;">
        </colgroup>
        <tr>
            <td>Column 1, Row 1</td>
            <td>Column 2, Row 1</td>
            <td>Column 3, Row 1</td>
        </tr>
        <tr>
            <td>Column 1, Row 2</td>
            <td>Column 2, Row 2</td>
            <td>Column 3, Row 2</td>
        </tr>
    </table>

</div>
