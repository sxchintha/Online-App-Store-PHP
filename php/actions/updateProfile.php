<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../register.php");
}

// include the database config file
include_once '../db/config.php';

// get all data that have been received from post method
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$contact = $_POST['contact'];
$email = $_POST['email'];

// update data to database
$userid = $_SESSION['SID'];
if ($_SESSION['role'] == 'developer') {
    $sql = "UPDATE developer
                SET fname='$firstname', lname='$lastname', contact='$contact', email='$email'
                WHERE iddeveloper=$userid";
} else {
    $sql = "UPDATE customer
                SET fname='$firstname', lname='$lastname', contact='$contact', email='$email'
                WHERE idcustomer=$userid";
}


if (mysqli_query($con, $sql)) {
    $_SESSION["fname"] = $firstname;
    $_SESSION["lname"] = $lastname;
    $_SESSION["contact"] = $contact;
    $_SESSION["email"] = $email;
    echo "<script> alert ('Profile successfully updated.');</script>";
    echo "<script>window.location.href = '../login.php';</script>";
} else {
    echo "<script> alert ('Error! Please try again.');</script>";
    echo "<script> history.back(); </script>";
}

mysqli_close($con);
