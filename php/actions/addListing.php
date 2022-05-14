<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../addListing.php");
}

include_once '../db/config.php';

$type = $_POST['applicationtype'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];
$language = $_POST['language'];
$website = $_POST['website'];
$email = $_POST['email'];
$contact = $_POST['contact'];

date_default_timezone_set("Asia/Colombo");
$posteddate = date("c");
$lastupdated = date("c");
$developerid =  $_SESSION["SID"];

$filename = $_FILES['fileToUpload']['name'];
$imagename = $_FILES['imageToUpload']['name'];

$fileExtention = pathinfo($filename, PATHINFO_EXTENSION);
$imageExtention = pathinfo($imagename, PATHINFO_EXTENSION);

if (!in_array($imageExtention, ['jpg', 'jpeg', 'png', 'webp'])) {
    echo "<script> alert ('Image extension must be .jpg, .webp or .png'); </script>";
    echo "<script> history.back(); </script>";
} elseif (!in_array($fileExtention, ['zip', 'exe'])) {
    echo "<script> alert ('File extension must be .zip, .exe or .apk'); </script>";
    echo "<script> history.back(); </script>";
} else {
    $newName = uniqid();
    $fileNewName = $newName . '.' . $fileExtention;
    $imageNewName = $newName . '.' . $imageExtention;
    $tempFile = $_FILES['fileToUpload']['tmp_name'];
    $tempImage = $_FILES['imageToUpload']['tmp_name'];
    $fileDestination = '../../uploads/apps/' . $fileNewName;
    $imageDestination = '../../uploads/images/' . $imageNewName;

    if (move_uploaded_file($tempImage, $imageDestination)) {
        if (move_uploaded_file($tempFile, $fileDestination)) {
            $filesize = $_FILES['fileToUpload']['size'];

            $sql = "insert into app
            (title, description, type, category, language, filename, imagename, filesize, downloads, website, email, contact, developer, posteddate, lastupdated, stars, ratecount) 
            values('$title', '$description', '$type', '$category', '$language', '$fileNewName', '$imageNewName', $filesize, 0, '$website', '$email', '$contact', $developerid, '$posteddate', '$lastupdated', 0, 0);";

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
