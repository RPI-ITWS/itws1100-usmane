<?php

session_start();
$_SESSION["loggedin"] = false;
$_SESSION["userid"] = null;
header("location: ./home.php");
