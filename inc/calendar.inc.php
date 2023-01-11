<?php

function getCalendarData() {
    if((isset($_GET["month"]) && isset($_GET["year"])) && ($_GET["month"]!=null && $_GET["year"]!=null))    {
        if(isset($_GET["ifEvent"]) && (empty($_GET["eventDay"]) || empty($_GET["Description"]) || empty($_GET["color"]))) {
            $month = date_parse($_GET["month"])['month'];
            $year = (int)($_GET["year"]);
            $eventDay = 0;
            $description = "";
            $color = "";
            $error = 2;
            $calendarData = array($month, $year, $eventDay, $description, $color, $error);   
            return $calendarData;          
        }
        else    {
            $month = date_parse($_GET["month"])['month'];
            $year = (int)($_GET["year"]);
            $eventDay = (int)($_GET["eventDay"]);
            $description = $_GET["Description"];
            $color = $_GET["color"];
            $error = 0;
            $calendarData = array($month, $year, $eventDay, $description, $color, $error);
            return $calendarData;    
        }             
    }
    else    {
        $month = (int)(date('m'));
        $year = (int)(date("Y"));
        $eventDay = 0;
        $description = "";
        $color = "";
        $error = 1;
        $calendarData = array($month, $year, $eventDay, $description, $color, $error); 
        return $calendarData;
    }   
}

?>