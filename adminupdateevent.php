<?php

session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}

require_once("dbconnect.php");

if(isset($_GET['eventID']))
{
	$getrecordsquery = $dbc -> prepare("SELECT eventID, eventName, eventLocation, eventDate, eventCost FROM floating_lights_festival.events WHERE eventID = :eventID");
	
	$getrecordsquery -> bindParam(':eventID', $_GET['eventID']);
	$getrecordsquery -> execute();
	
	$pagetitle = "Admin: Update Events";
	$pageclass = "admin";
	include("header.php");
	
	echo "<main>";
	
	
	if(isset($_GET['error'])){
		echo "<section class='error'>" . $_GET['error'] . "</section>";
	}
	
	echo "<form method='post' action='" . $_SERVER['PHP_SELF'] . "'>";
	
	while($row = $getrecordsquery -> fetch())
	{
		echo "<label for='eventName'>Event Name</label>";
		echo "<input type='text' name='eventName' id='eventName' value='" . $row['eventName'] . "'>";
	
		echo "<label for='eventLocation'>Event Location</label>";
		echo "<input type='text' name='eventLocation' id='eventLocation' value='" . $row['eventLocation'] . "'>";
		
		echo "<label for='eventDate'>Event Date</label>";
		echo "<input type='date' name='eventDate' id='eventDate' value='" . $row['eventDate'] . "'>";
		
		echo "<label for='eventCost'>Event Cost</label>";
		echo "<input type='text' name='eventCost' id='eventCost' value='" . $row['eventCost'] . "'>";

		echo "<input type='hidden' name='eventID' id='eventID' value='" . $row['eventID'] . "'>";
	}
	
	echo "<input type='submit' value='Update Event'>";
	echo "</main>";
	include("footer.php");
}

else if(isset($_POST['eventID']))
{
	$error = array();
	$data = array();
	
	/*if($_POST['eventName'] != "")
	{
		$data['eventName'] = $_POST['eventName'];
	}
	else{
		$error = "You must have an Event Name.";
	}
	
	if($_POST['eventLocation'] != ""){
		$data['eventLocation'] = $_POST['eventLocation'];
	}
	else{
		$error = "You must have an Event Location";
	}
	
	if($_POST['eventDate'] != ""){
		$data['eventDate'] = $_POST['eventDate'];
	}
	else{
		$error = "You must have an Event Date";
	}*/
	
	if($_POST['eventName'] != "")
    {
        $eventName = $_POST['eventName'];
        $data['eventName'] = $eventName;        
    }
    else
    {
        $error[] = 'You must enter an Event Name';        
    }
    if($_POST['eventLocation'] != "")
   {
       $eventLocation = $_POST['eventLocation'];
       $data['eventLocation'] = $eventLocation;
   }        
    else
    {
        $error[] = 'You must enter an Event Location';
    }
    if($_POST['eventDate'] != "")        
    {
        $eventDate = $_POST['eventDate'];
        $data['eventDate'] = $eventDate;
    }
    else
    {
        $error[] = 'You must enter an Event Date';
    }    

	if($_POST['eventCost'] != "")        
    {
        $eventCost = $_POST['eventCost'];
        $data['eventCost'] = $eventCost;
    }
    else
    {
        $error[] = 'You must enter an Event Cost';
    } 
	
	$data['eventID'] = $_POST['eventID'];
	
	if(empty($error))
	{
		$updatequery = $dbc -> prepare("UPDATE floating_lights_festival.events SET  eventName = :eventName, eventLocation = :eventLocation, eventDate = :eventDate, eventCost = :eventCost
										WHERE eventID = :eventID");
		
		$updatequery -> execute($data);
		
		//header("location: admineventlist.php");
		$pagetitle = "Event Updated";
		$pageclass = "updateeventPage";
		include("header.php");
		echo "<h1>Event successfully updated!</h1>";
		echo "<p style='text-align:center;'>Go back to <a href='admineventlist.php'> Event list Page</a></p>";
		include("footer.php");		
	}
	
	else{
		
		/*$pagetitle = "Submission Unsuccessful";
		$pageclass = "updateeventPage";
		include("header.php");
		echo "<h3>  There were errors in your submission!</h3>";//Please Review your submission!*/
		
		
		$message = "<ul>";
		foreach($error as $value)
		{
			 $message .= "<li>$value</li>";
		}
		echo($message .= "</ul>");
		//echo "<p style='text-align:center;'>Go back to <a href='admineventlist.php'> Event list Page</a></p>";
		$message = urlencode($message);
		//include("footer.php");
		header("location:". $_SERVER['PHP_SELF'] . "?error=$message&eventID=" . $_POST['eventID']);
	}	
} else {
	header("location: admineventlist.php");
}
?>