<?php
  session_start();
  if (!array_key_exists("loggedin", $_SESSION) || $_SESSION["loggedin"] !== true) {
    header("location: ./login.php");
    exit;
  }
?>
