<?php

$user = 'root';
$pass = '';
$host = 'localhost';
$dbname = 'floating_lights_festival';

try {
    $dbc = new PDO("mysql:host=$host; dbdname=$dbname", $user, $pass);
} 
catch(PDOException $e) 
{
    echo $e->getMessage();
}