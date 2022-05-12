<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>

<!-- Fonts, Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <h2 class="user-form-title">Developer login</h2><br />
    <form action="./actions/developerLogin.php" method="POST">

        <div class="row">
            <div class="col-25">
                <label for="fname">Email:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-75 loginText">
                <input type="text" id="demail" name="email" placeholder="Your email.." required />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Password:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-75 loginText">
                <input type="password" id="dpassword" name="password" placeholder="Your password.." required />
            </div>
        </div>
        <br>
        <div class="button-center">
            <button class="submit">Login</button>
        </div>
    </form>
    <br>
    <div class="button-center">
        <br>
        <p>
            Need an account?
            <a href="./register.php"> Sign up</a>
        </p>
    </div>
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