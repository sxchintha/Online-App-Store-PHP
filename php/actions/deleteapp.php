<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the addlisting form
if (!isset($_GET['itemid']) || $_SESSION['role'] == 'user') {
    echo "<script>window.location.href = '../404.php';</script>";
    exit;
}

// include the database config file
include_once '../db/config.php';

// Get item id
$itemid = $_GET['itemid'];
$userid = $_SESSION['SID'];

$deleteApp = "delete from app where idapp=$itemid and developer=$userid";

if (mysqli_query($con, $deleteApp)) {
    echo "<script> alert ('App successfully deleted.');</script>";
    echo "<script>window.location.href = '../profile.php';</script>";
} else {
    echo "<script> alert ('Error! Please try again.');</script>";
    echo "<script> history.back(); </script>";
}
