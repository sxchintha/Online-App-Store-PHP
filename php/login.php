<?php

session_start();
include './components/header.php';

// Check if the user is already logged in, if yes then redirect to profile page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && !empty($_SESSION["SID"])) {
    echo "<script>window.location.href = './profile.php';</script>";
    exit;
}

?>

<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>
<br>

<div class="row">
    <div class="userSelectColumn" style="text-align: center;">
        <img src="../img/login.png">
        <h3 style="text-align: center;">Select the desired profile type</h3><br>
        <div class="tab button-center">
            <button class="tablinks" id="defaultOpen" onclick="openForm(event, 'userTab')">User</button>
            <button class="tablinks" onclick="openForm(event, 'developerTab')">Klick Developer</button>
        </div>
    </div>
    <div class="loginColumn">
        <div id="userTab" class="tabcontent">
            <?php
            include './user/login.php'
            ?>
        </div>

        <div id="developerTab" class="tabcontent">
            <?php
            include './developer/login.php'
            ?>
        </div>
    </div>
</div>

<script>
    function openForm(evt, formName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(formName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();
</script>