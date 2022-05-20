<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the addlisting form
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../addListing.php");
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

if($priceset == 'free') {
    $price = 0;
} else {
    $price = $_POST['appprice'];
}

// set the default time zone to Asia/Colombo
date_default_timezone_set("Asia/Colombo");

// set posted date and last updated date to current date and time
$posteddate = date("c");
$lastupdated = date("c");
$developerid =  $_SESSION["SID"];

// Upload the image and the file
$filename = $_FILES['fileToUpload']['name'];
$imagename = $_FILES['imageToUpload']['name'];

$fileExtention = pathinfo($filename, PATHINFO_EXTENSION);
$imageExtention = pathinfo($imagename, PATHINFO_EXTENSION);

if (!in_array($imageExtention, ['jpg', 'jpeg', 'png', 'webp', 'svg'])) {
    echo "<script> alert ('Image extension must be .jpg, .webp or .png'); </script>";
    echo "<script> history.back(); </script>";
} elseif (!in_array($fileExtention, ['zip', 'exe'])) {
    echo "<script> alert ('File extension must be .zip, .exe or .apk'); </script>";
    echo "<script> history.back(); </script>";
} else {
    // Get a uniqname to image and uploaded file
    $newName = uniqid();
    $fileNewName = $newName . '.' . $fileExtention;
    $imageNewName = $newName . '.' . $imageExtention;
    $tempFile = $_FILES['fileToUpload']['tmp_name'];
    $tempImage = $_FILES['imageToUpload']['tmp_name'];
    $fileDestination = '../../uploads/apps/' . $fileNewName;
    $imageDestination = '../../uploads/images/' . $imageNewName;

    // Move files to the relevent paths
    if (move_uploaded_file($tempImage, $imageDestination)) {
        if (move_uploaded_file($tempFile, $fileDestination)) {
            $filesize = $_FILES['fileToUpload']['size'];

            // Insert app data to database
            $sql = "insert into app
            (title, description, type, category, language, filename, imagename, filesize, downloads, website, email, contact, developer, posteddate, lastupdated, stars, ratecount, price) 
            values('$title', '$description', '$type', '$category', '$language', '$fileNewName', '$imageNewName', $filesize, 0, '$website', '$email', '$contact', $developerid, '$posteddate', '$lastupdated', 0, 0, $price);";

            if (mysqli_query($con, $sql)) {
                echo "<script> alert ('Application successfully listed.');</script>";
                echo "<script>window.location.href = '../profile.php';</script>";
            } else {
                echo "<script> alert ('Error! Please try again.');</script>";
                echo "<script> history.back(); </script>";
            }
        } else {
            echo "<script> alert ('Upload failed!'); </script>";
            echo "<script> history.back(); </script>";
        }
    } else {
        echo "<script> alert ('Upload failed!'); </script>";
        echo "<script> history.back(); </script>";
    }
}
