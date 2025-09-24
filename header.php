<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
		<title><?php echo $pagetitle ?> </title>
        <link rel="stylesheet" type="text/css" href="styles.css">	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
	</head>

    <body>
		<div id="wrapper">
		<header>	
			<!--<nav>--><div class="navbar">
					<a href="index.php">Home</a>
					<!--<a href="events.php">Events</a>-->
					<a href="schedule.php">Schedule</a>
					<a href="contact.php">Contact</a>
					<!--
					<a href="loginform.php">Log In</a>-->

					<div class="dropdown"><a href="admin.php">Admin</a>
					<button class="dropbtn">
					 <i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
					<a href="adduser.php">Create Account</a>
					
					<a href="addeventform.php">Event Form</a>
					<a href="admineventlist.php">Event List</a>	
					<a href="logout.php">Log out</a>			
			</div><!--</div></div>-->
			<!--</nav>-->
		</header>