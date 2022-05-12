<?php

$serverName = "localhost";
$username = "root";
$password = "root";
$dbName = "online_app_store";

// Create connection
$con = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
