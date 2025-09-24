<?php

session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}

if(isset($_POST['eventName']))
{   
	$error = array();
    $data = array();
    $uploaderror = "";
	
    if (isset($_FILES['picture'])){
        $allowed = array('image/jpg', 'image/jpeg', 'image/png', 'image/gif');
        if(in_array($_FILES['picture']['type'], $allowed)){
            if(move_uploaded_file($_FILES['picture']['tmp_name'], "images/{$_FILES['picture']['name']}")){
                $reviewImagePath = $_FILES['picture']['name'];
                $data['eventImage'] = $reviewImagePath;
            }
            else {
                switch($_FILES['picture']['error']){
                    case 1:
                        $uploaderror .= "This file exceeds the upload_max_filesize setting in php.ini";
                        break;
                    case 2:
                        $uploaderror .= "This file exceeds the MAX_FILE_SIZE setting in the HTML";
                        break;
                    case 3:
                        $uploaderror .= "The file was only partially uploaded";
                        break;
                    case 4:
                        $uploaderror .= "No file was uploaded";
                        break;
                    case 6:
                        $uploaderror .= "No temporary folder was available";
                        break;
                    default:
                        $uploaderror .= "A system error occured";
                }
            }
        }else {
            $uploaderror .= "Please upload a PNG, JPG, or GIF";
        }
    } else {
        $error[] = "Please select a file to upload";
    }

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
    //if no errors, process the form
	if(empty($error)) 
    {
       include("dbconnect.php");
        $query = $dbc->prepare("INSERT INTO floating_lights_festival.events (eventName, eventLocation, eventDate, eventCost, eventImage) 
            VALUES (:eventName, :eventLocation, :eventDate, :eventCost, :eventImage)");
        
		$query->execute($data);	
        header("location:schedule.php");	
		
		/*$pagetitle = "New Event Submitted";
		$pageclass = "addeventPage";
		include("header.php");
		echo "<h1>Thank You for adding an Event!</h1>";
		echo "<p style='text-align:center;'>Go back to <a href='addeventform.php'> Add Event Page</a></p>";
		include("footer.php");*/
    }
    else //if there were errors...
	{
        $pagetitle = "Submission Unsuccessful";
		$pageclass = "addeventPage";
		include("header.php");
		echo "There were errors in your submission";
		
		$message = "<ul>";
        foreach($error as $value)
        {
            $message .= "<li> $value </li>";
        }
        echo($message .= "</ul>"); 
		echo "<p><a href='addeventform.php'>Return to form</a></p>";
		include("footer.php");
		//header("location:addeventform.php");
    }	
}
//end of page