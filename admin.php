<?php

session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}

require_once ("dbconnect.php");

$pagetitle = "Admin";
$pageclass = "admin";
include("header.php");
?>
<main>
	<h1>Admin</h1>
    <ul>
        <li><a href="adduser.php">Create Account</a></li>
        <!--<li><a href="loginform.php">Log In</a></li>				-->
        <li><a href="addeventform.php">Event Form</a></li>
        <li><a href="admineventlist.php">Event List</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>
</main>
<?php include ("footer.php");