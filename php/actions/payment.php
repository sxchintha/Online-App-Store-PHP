<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the addlisting form
if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['itemid'])) {
    header("location: ../404.php");
}
// include the database config file
include_once '../db/config.php';

// get all data that have been received from post method
$itemid = $_POST['itemid'];
$fullname = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$noc = $_POST['cardname']; // Name on card

$userid = $_SESSION['SID'];

// Insert data
$sql = "INSERT into payment(fullname, email, `address`, city, `state`, zip, nameoncard, userid, appid, userrole)
        values('$fullname', '$email', '$address', '$city', '$state', $zip, '$noc', $userid, $itemid, '$userrole')";

if (mysqli_query($con, $sql)) {
    echo "<script> alert ('Payment successful.');</script>";
    echo "<script>window.location.href = '../itemDetail.php?itemid=" . $itemid . "';</script>";
} else {
    echo "<script> alert ('Error! Payment cannot be made.');</script>";
    echo "<script> history.back(); </script>";
}
