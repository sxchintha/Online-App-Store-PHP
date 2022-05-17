<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../profile.php");
}

// include the database config file
include_once '../db/config.php';

// get all data that have been received from post method
$currpass = $_POST['currpassword'];
$password = $_POST['password'];
$userid = $_SESSION['SID'];

// Check current password
if($_SESSION['role'] == 'developer') {
    $checkCurr = "select fname from developer where iddeveloper = $userid and password = '$currpass'";
} else {
    $checkCurr = "select fname from customer where idcustomer = $userid and password = '$currpass'";
}
$result = mysqli_query($con, $checkCurr);

if($result->num_rows == 1) {
    if($_SESSION['role'] == 'developer') {
        $updatePass = "update developer set password='$password' where iddeveloper=$userid";
    } else {
        $updatePass = "update customer set password='$password' where idcustomer=$userid";
    }

    if(mysqli_query($con, $updatePass)) {
        echo "<script> alert ('Password successfully updated.');</script>";
        echo "<script>window.location.href = '../profile.php';</script>";
    }

} else {
    echo "<script> alert ('Invalid current password.'); </script>";
    echo "<script> history.back(); </script>";
}