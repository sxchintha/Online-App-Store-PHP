<?php
session_start();
include './components/newNav.php';

// Check login status
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true && empty($_SESSION["SID"])) {
    echo "<script>window.location.href = './login.php';</script>";
    exit;
}
?>
<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/profile.css';
    ?>
</style>
<br>

<div class="tab">
    <h1><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></h1>
    <span class="description"><?php echo $_SESSION['email'] ?></span>
    <?php
    if ($_SESSION['role'] === 'developer') {
        echo '
            <a href="addListing.php" class="button-center">Add New</a>
            <div class="button-center">
                <button class="tablinks" onclick="openTab(event,' . "'myuploads'" . ')" id="defaultOpen">My Uploads</button>
            </div>
        ';
    } else {
        echo '
            <div class="button-center">
                <button class="tablinks" onclick="openTab(event,' . "'mydownloads'" . ')" id="defaultOpen">Downloads</button>
            </div>
        ';
    }


    ?>

    <div class="button-center">
        <button class="tablinks" onclick="openTab(event, 'updateprofile')">Update Profile</button>
    </div>
    <div class="button-center">
        <button class="tablinks" onclick="openTab(event, 'changepass')">Change Password</button>
    </div>
</div>

<div id="myuploads" class="tabcontent"></div>

<div id="mydownloads" class="tabcontent"></div>

<div id="updateprofile" class="tabcontent"></div>

<div id="changepass" class="tabcontent"></div>


<script>
    function openTab(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>