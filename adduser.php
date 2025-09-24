<?php

/*session_start();
if(!isset($_SESSION['userID']))
{
    include("loginform.php");
    exit();
}*/

$pagetitle = "Add User";
$pageclass = "userPage";
include("header.php");
?>

<form method="post" action="adduseraction.php">
    <fieldset> <legend>Create an Account</legend>
       
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname">

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="firstname">
        
        <input type="submit" value="Add User">
    </fieldset>
</form>

<?php
include("footer.php");
?>
