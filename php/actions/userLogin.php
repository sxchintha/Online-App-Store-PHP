<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the login page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../login.php");
}

// include the database config file
include_once '../db/config.php';


// Check if username is empty
if (empty(trim($_POST["email"]))) {
    echo "<script> alert ('Email is empty'); </script>";
    echo "<script> history.back(); </script>";
} else {
    $email = trim($_POST["email"]);
}

// Check if password is empty
if (empty(trim($_POST["password"]))) {
    echo "<script> alert ('Password is empty'); </script>";
    echo "<script> history.back(); </script>";
} else {
    $password = trim($_POST["password"]);
}

// Check if the user is exists in the database
$sql = "select `idcustomer`, `fname`, `lname`, `contact`, `email` from `customer` where `email`='$email' and `password`='$password'";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Set session variables
    $_SESSION["loggedin"] = true;
    $_SESSION["SID"] = $row['idcustomer'];
    $_SESSION["fname"] = $row['fname'];
    $_SESSION["lname"] = $row['lname'];
    $_SESSION["contact"] = $row['contact'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["role"] = "user";

    echo "<script>window.location.href = '../profile.php';</script>";
} else {
    echo "<script> alert ('Invalid username or password.'); </script>";
    echo "<script> history.back(); </script>";
}


mysqli_close($con);
