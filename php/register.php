<?php
session_start();
include './components/header.php';
?>

<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>
<br>
<div class="tab button-center">
    <button class="tablinks" onclick="openForm(event, 'developerTab')">Register as a Developer</button>
    <button class="tablinks" id="defaultOpen" onclick="openForm(event, 'userTab')">Register as a User</button>
</div>

<div id="userTab" class="tabcontent">
    <?php
    include './user/register.php'
    ?>
</div>

<div id="developerTab" class="tabcontent">
    <?php
    include './developer/register.php'
    ?>
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