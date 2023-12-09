<?php


$server = "localhost";
$user = "phpmyadmin";
$password = "Loveshadow12!";
$database = "mySite";


$db = new mysqli($server, $user, $password, $database);


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
