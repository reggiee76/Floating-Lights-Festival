<?php

session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}

$pagetitle = "Add New Event";
$pageclass = "eventPage";

include("header.php");
?>
<main>
<form method="post" action="addeventaction.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Add New Event</legend>
            <label for="eventName">Event Name</label>
            <input type="text" name="eventName" id="eventName">
            <label for="eventLocation">Event Location</label>
            <input type="text" name="eventLocation" id="eventLocation">
            <label for="eventDate">Event Date</label>
            <input type="date" name="eventDate" id="eventDate">
            <label for="eventCost">Event Cost </label>
            <input type="text" name="eventCost" id="eventCost">
            <label for="picture">Event Image (JPG, PNG, or GIF, max size 1MB)</label>
            <input type="file" name="picture" id="picture" accept=".jpg, .png, .gif">
            
            <!--<label for="eventPageID">Event Page ID</label>
            <input type="text" name="eventPageID" id="eventPageID">
            <label for="eventImgAlt">Event Image Alt</label>
            <input type="text" name="eventImgAlt" id="eventImgAlt">-->
            <input type="submit" value="Add Event">
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
        </fieldset>
    </form>
</main>
<?php
include("footer.php");
?>