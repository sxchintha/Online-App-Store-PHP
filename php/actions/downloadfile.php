<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the addlisting form
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../404.php");
}

// include the database config file
include_once '../db/config.php';

if (isset($_POST['itemid'])) {
    $id = $_POST['itemid'];

    $sql = "select filename, downloads from app where idapp= $id";

    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_row($result);

    $filepath = '../../uploads/apps/' . $file[0];

    if (file_exists($filepath)) {
        
        header('Content-Type: application/octet-stream');

        header('Content-Description: File Transfer');

        header('Content-Disposition: attachment; filename='
            . basename($filepath));

        header('Expires: 0');

        header('Cache-Control: must-revalidate');

        header('Pragma:public');

        header('Content-length:' . filesize($filepath));


        readfile($filepath);

        $newCount = $file[1] + 1;

        $updateQuery = "update app set downloads= $newCount where idapp = $id";

        mysqli_query($con, $updateQuery);

        exit;
    }
} else {
    echo "<script> alert ('Cannot download!'); </script>";
    echo "<script> history.back(); </script>";
}
