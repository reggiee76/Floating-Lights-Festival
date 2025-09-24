<?php
session_start();

$_SESSION = array();

session_destroy();

$msg = urlencode("You have been logged out");

header("Location:loginform.php?msg=$msg");
