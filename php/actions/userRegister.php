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
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

// Check for duplicate email or password
$chkDuplicateEmail = mysqli_query($con, "select * from customer where email='$email' ");
$chkDuplicateContact = mysqli_query($con, "select * from customer where contact='$contact' ");

if (mysqli_num_rows($chkDuplicateEmail) > 0) {
    echo "<script> alert ('The EMAIL you have entered is already taken!'); </script>";
    echo "<script> history.back(); </script>";
} elseif (mysqli_num_rows($chkDuplicateContact) > 0) {
    echo "<script> alert ('The CONTACT number you have entered is already taken!'); </script>";
    echo "<script> history.back(); </script>";
} else {

    // insert data to database
    $sql = "insert into customer(fname,lname,contact,password,email) values('$firstname','$lastname','$contact','$password','$email')";

    if (mysqli_query($con, $sql)) {
        echo "<script> alert ('User successfully registered.');</script>";
        echo "<script>window.location.href = '../login.php';</script>";
    } else {
        echo "<script> alert ('Error! Please try again.');</script>";
        echo "<script> history.back(); </script>";
    }
}
mysqli_close($con);
