<?php

function connect() {
  require __DIR__ . './conn.php';
  $conn = new mysqli($host, $username, $password, $database);
  if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
  }
  return $conn;
}

$db = connect();