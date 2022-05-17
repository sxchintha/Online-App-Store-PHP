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
    <form action="../actions/changePass.php" method="POST" name="registerForm">
        <div class="row">
            <div class="col-25">
                <label for="Password">Current Password:</label>
            </div>
            <div class="col-75">
                <input type="password" id="currpassword" name="currpassword" placeholder="Your current password.." required />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Password">New Password:</label>
            </div>
            <div class="col-75">
                <input type="password" id="password" name="password" placeholder="New password.." required onkeyup='check();' />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Confirm Password">Confirm New Password:</label><i id="checkPassIcon"></i>
            </div>
            <div class="col-75">
                <input type="password" id="cpassword" name="cpassword" placeholder="Enter new password again.." required onkeyup='check();' />
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

<?php
include '../components/footerNew.php';
?>

<script>
    var check = function() {

        let password = document.getElementById('password')
        let cpassword = document.getElementById('cpassword')
        let checkPassIcon = document.getElementById('checkPassIcon')
        let submitBtn = document.getElementById('submitBtn')

        if (password.value == cpassword.value) {
            cpassword.style.color = 'green';
            cpassword.style.borderColor = 'green';
            checkPassIcon.style.color = 'green';
            checkPassIcon.className = 'far fa-check-circle'
            submitBtn.disabled = false
        } else {
            cpassword.style.color = 'red';
            cpassword.style.borderColor = 'red';
            checkPassIcon.style.color = 'red';
            checkPassIcon.className = 'fa fa-close'
            submitBtn.disabled = true
        }
    }
</script>