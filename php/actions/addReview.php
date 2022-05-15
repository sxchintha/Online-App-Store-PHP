<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the login page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../login.php");
}

// include the database config file
include_once '../db/config.php';

// get all data that have been received from post method
$itemid  = $_POST['itemid'];
$subject = $_POST['subject'];
$country = $_POST['country'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

// Get current stars and rate count of the app
$sql = "select stars, ratecount from app where idapp = $itemid";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    $app = $result->fetch_assoc();
    $newStars = (int)$app['stars'] + (int)$rating;
    $newratecount = (int)$app['ratecount'] + 1;
    $userid = $_SESSION['SID'];

    // Add review to the database and update the star count
    $addsql = "insert into appreview(userid, appid, subject, country, rating, comment) 
            values('$userid', '$itemid', '$subject', '$country', '$rating', '$comment');";
    $addsql .= "update app set stars = $newStars, ratecount = $newratecount where idapp = $itemid;";

    if (mysqli_multi_query($con, $addsql)) {
        echo "<script> alert ('Review successfully added.');</script>";
        echo "<script>window.location.href = '../itemDetail.php?itemid=$itemid';</script>";
    } else {
        echo "<script> alert ('Error! Please try again.'); </script>";
        echo "<script> history.back(); </script>";
    }
} else {
    echo "<script> alert ('Cannot add review!'); </script>";
    echo "<script> history.back(); </script>";
}

mysqli_close($con);
