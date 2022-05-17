<?php
session_start();
include '../components/newNav.php';
?>
<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>

<!-- Fonts, Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container" style="width: 70%;">
    <h2 class="user-form-title">Update profile details</h2><br />
    <form action="../actions/updateProfile.php" method="POST" name="registerForm">
        <div class="row">
            <div class="col-25">
                <label for="First Name">First Name:</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="fname" placeholder="Your  first name.." required value="<?php echo $_SESSION['fname'] ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Last Name">Last Name:</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="lname" placeholder="Your last name.." required value="<?php echo $_SESSION['lname'] ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Email">Email:</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" name="email" placeholder="Your email.." required value="<?php echo $_SESSION['email'] ?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Contact">Contact No:</label>
            </div>
            <div class="col-75">
                <input type="tel" id="contact" name="contact" placeholder="Contact No.." pattern="[0-9]{10}" value="<?php echo $_SESSION['contact'] ?>"/>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-25"></div>
            <div class="col-75">
                <button type="submit" id="submitBtn" class="submit">Update</button>
                <button type="button" id="cancelBtn" class="cancel" onclick="history.back();">Cancel</button>
            </div>

        </div>
    </form>
</div>