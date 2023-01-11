<?php

function html_CalendarForm()  {
    echo '<!DOCTYPE html>
    <html>
        <head>
            <title>Lab03-HTML Calendar</title>
        </head>
    </html>
    
    <body>
        <h1>PHP Calendar by Kaisen</h1>
        <hr>
        <form action="" method="get">
            <label>Month: </label>
            <select name="month">
                <option></option>
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>Semptember</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
            </select><br><br>
    
            <label>Year: </label>
            <select name="year">
                <option></option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
            </select><br><br>
    
            <input type="checkbox" name="ifEvent"><label>Mark a special event.</label><br><br>
            
            <label>Special Event Day</label>
            <input type="number" name="eventDay"><br><br>
    
            <label>Description:</label><br>
            <textarea name="Description"></textarea><br><br>
    
            <label>Please select a color.</label><br>
            <select name="color">
                <option></option>
                <option>Green</option>
                <option>Red</option>
                <option>Blue</option>
            </select><br><br>
    
            <input type="submit" value="Generate Calendar">
        </form><br>
    </body>
    </html>';
}

function html_Error($error)    {
    switch($error) {
        case 1: 
            echo "Input error Message: You didn't select year, month or both. Current month calendar will be shown." ."<br><br>";
            break;
        case 2: 
            echo "Input error Message: Event day information are not complete. Event day will not be shown."."<br><br>";
            break;
    }
}

function html_Calendar($data)   {    
    //Get the month and year data and convert the string to integer.
    $month = $data[0];
    $year = $data[1];
    $eventDay = $data[2];
    $description = $data[3];
    $color = $data[4];

    //Get unix timestamp of the first day of the month.
    $firstDay = mktime(0,0,0,$month,1,$year);

    //The first day's weekday name;
    $weekDayNameofFirstDay = date("l", $firstDay);

    //Get the number of day in this month.
    $numberOfDaysInMonth = cal_days_in_month(0, $month, $year);
    
    //Get the month name;
    $monthName = date("F",$firstDay);

    //Define how many blank the calendar should have.
    switch($weekDayNameofFirstDay) {
        case "Sunday": $blank = 0; break;
        case "Monday": $blank = 1; break;
        case "Tuesday": $blank = 2; break;
        case "Wednesday": $blank = 3; break;
        case "Thurday": $blank = 4; break;
        case "Friday": $blank = 5; break;
        case "Saturday": $blank = 6; break;
    }

    //Create the calender name.
    echo $year." - ".$monthName." - PHP Calendar by Kaisen";

    //Create a 7*6 table.
    //Begin the table.
    echo "<table border=1>";
    //Define header.
    echo "<tr style='height:20px'>
    <th style='text-align:center'>Sunday</th>
    <th>Monday</th>
    <th>Tuesday</th>
    <th>Wednesday</th>
    <th>Thursday</th>
    <th>Friday</th>
    <th>Saturday</th>
    </tr>";

    //Store the day of month.
    $dayOnCalendar = 1;
    
    //Creat cells.    
   for($x=1;$x<=6;$x++) {        
        echo "<tr style='height:20px'>";
        for($y=1;$y<=7;$y++) {            
            if(($x==1 && $y<=$blank) || ($dayOnCalendar>$numberOfDaysInMonth))     {
                echo "<td bgcolor='gray'></td>";
            }
            elseif($dayOnCalendar == $eventDay) {
                echo "<td bgcolor=".$color .">". $dayOnCalendar. "-". $description."</td>";
                $dayOnCalendar++;
            }
            else{
                 echo "<td>".$dayOnCalendar."</td>";
                 $dayOnCalendar++;
            }
        }
        echo "</tr>";
    }     
    //Close the table.
    echo "</table>"; 
}
?>