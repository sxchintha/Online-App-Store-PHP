<?php
require './db/config.php';

// Check login status
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true && empty($_SESSION["SID"])) {
    echo "<script>window.location.href = './login.php';</script>";
    exit;
}
$userid = $_SESSION['SID'];
$mysql = "SELECT idapp, title, imagename, downloads
                FROM app 
                WHERE developer = $userid";

$myapps = mysqli_query($con, $mysql);

while ($app = $myapps->fetch_assoc()) {
    include './components/myUploadCard.php';
}

?>

<script>
    function deleteFunc(id) {
        let text = "Delete application?";
        if (confirm(text) == true) {
            window.location.href = './actions/deleteapp.php?itemid=' + id
        }
    }
</script>