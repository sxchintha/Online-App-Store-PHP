<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>

<!-- Fonts, Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <h2 class="user-form-title">Create new user account</h2><br />
    <form action="./actions/userRegister.php" method="POST" name="registerForm">
        <div class="row">
            <div class="col-25">
                <label for="First Name">First Name:</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="fname" placeholder="Your  first name.." required />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Last Name">Last Name:</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="lname" placeholder="Your last name.." required />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Email">Email:</label>
            </div>
            <div class="col-75">
                <input type="email" id="email" name="email" placeholder="Your email.." required />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Password">Password:</label>
            </div>
            <div class="col-75">
                <input type="password" id="password" name="password" placeholder="Your password.." required required onkeyup='check();' />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Confirm Password">Confirm Password:</label><i id="checkPassIcon"></i>
            </div>
            <div class="col-75">
                <input type="password" id="cpassword" name="cpassword" placeholder="Enter password again.." required onkeyup='check();' />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="Contact">Contact No:</label>
            </div>
            <div class="col-75">
                <input type="tel" id="contact" name="contact" placeholder="Contact No.." pattern="[0-9]{10}"/>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-25">
                <label for="fname"></label>
            </div>
            <div class="col-75">
                <input type="checkbox" name="tnc" style="margin-bottom: 15px" required />
                Accept Terms and Conditions
            </div>
        </div>
        <div class="row">
            <div class="col-25"></div>
            <div class="col-75">
                <button id="submitBtn" class="submit">Submit</button>
            </div>
        </div>
    </form>
    <br>
    <div class="hr-line">
        <span class="line-text">OR</span>
    </div>

    <div class="button-center">
        <button class="btn facebook">
            <i class="fa fa-facebook"></i>
            Sign Up with Facebook
        </button>
    </div>
    <div class="button-center">
        <button class="btn google">
            <i class="fa fa-google"></i>
            Sign Up with Google
        </button>
    </div>
    <div class="button-center">
        <button class="btn twitter">
            <i class="fa fa-twitter"></i>
            Sign Up with Twitter
        </button>
    </div>

</div>

<script>
    function submitForm() {
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('cpassword').value;

        if (password === cpassword) {
            document.registerForm.submit("actions/userRegister.php");
        } else {
            window.alert('Confirm password does not match!')
        }

    }

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