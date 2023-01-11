<?php

/**
 * Student Name: Kaisen Wu
 * Student Number: 300341264
 * Lab03
**/

//Rference the function files.
require_once("./inc/html.inc.php");
require_once("./inc/calendar.inc.php");

//Store the error number, diffrent error will display different error message. 
$error = 0;
//Store all the data which will needed by create calendar.
$calendarData = array();

//Prompt user to input data.
html_CalendarForm();    

//Get the data from form.
$calendarData = getCalendarData();

//Get the error number.
$error = $calendarData[5];
//Display the error message.
html_Error($error);

//Create and display the calendar.
html_Calendar($calendarData);

?>











