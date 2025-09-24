<?php

session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}

require_once("dbconnect.php");
$pagetitle = "Admin: Event List";
$pageclass = "admin";
include("header.php");

$query = $dbc->prepare("SELECT eventID, eventName FROM floating_lights_festival.events");
$query->execute();

echo "<main>";
echo "<ul>";

while($row = $query->fetch())
{
	echo "<li>" . $row['eventName'] . " (<a href='adminupdateevent.php?eventID=" . $row['eventID'] . "'> Edit Event</a>)</li>";
}
echo "</ul>";
echo "</main>";
include("footer.php");
?>