<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the addlisting form
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<script>window.location.href = '../404.php';</script>";
    exit;
}

// include the database config file
include_once '../db/config.php';

// get all data that have been received from post method
$type = $_POST['applicationtype'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$language = $_POST['language'];
$website = $_POST['website'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$priceset = $_POST['price'];
$itemid = $_POST['itemid'];

if ($priceset == 'free') {
    $price = 0;
} else {
    $price = $_POST['appprice'];
}

// set the default time zone to Asia/Colombo
date_default_timezone_set("Asia/Colombo");

// set posted date and last updated date to current date and time
$lastupdated = date("c");

$sql = "UPDATE app
        SET title='$title', `description`='$description', `type`='$type',
        category='$category', `language`='$language', website='$website',
        email='$email', contact='$contact', lastupdated='$lastupdated',
        price=$price
        WHERE idapp=$itemid";

if (mysqli_query($con, $sql)) {
    echo "<script> alert ('App successfully updated.');</script>";
    echo "<script>window.location.href = '../profile.php';</script>";
} else {
    echo "<script> alert ('Error! Please try again.');</script>";
    echo "<script> history.back(); </script>";
}
mysqli_close($con);
