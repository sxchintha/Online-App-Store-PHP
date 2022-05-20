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
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/myUploadCard.css';
    ?>
</style>
<br>

<div class="tab">
    <h1><?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></h1>
    <span class="description"><?php echo $_SESSION['email'] ?></span>
    <?php
    if ($_SESSION['role'] === 'developer') {
        echo '
            <div class="button-center">
                <button class="tablinks" onclick="document.location=' . "'addListing.php'" . '">Add New</button>
            </div>
            <div class="button-center">
                <button class="tablinks" onclick="openTab(event,' . "'myuploads'" . ')" id="defaultOpen">My Uploads</button>
            </div>
        ';
    }
    ?>

    <div class="button-center">
        <button class="tablinks" onclick="document.location='./profile/updateprofile.php'">Update Profile</button>
    </div>
    <div class="button-center">
        <button class="tablinks" onclick="document.location='./profile/changePass.php'">Change Password</button>
    </div>
</div>

<div id="myuploads" class="tabcontent" style="display: none;">
    <?php
    include './profile/myuploads.php';
    ?>
</div>

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>