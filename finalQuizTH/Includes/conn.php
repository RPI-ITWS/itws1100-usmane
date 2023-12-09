<?php

// Connection parameters
$server = "localhost";
$user = "phpmyadmin";
$password = "Loveshadow12!";
$database = "mySite";

// Create a connection
$db = new mysqli($server, $user, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
