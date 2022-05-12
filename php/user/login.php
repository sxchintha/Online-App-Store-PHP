<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>

<!-- Fonts, Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <h2 class="user-form-title">User login</h2><br />
    <form action="action_page.php">

        <div class="row">
            <div class="col-25">
                <label for="fname">Email:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-75 loginText">
                <input type="text" id="email" name="email" placeholder="Your email.." required />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="fname">Password:</label>
            </div>
        </div>
        <div class="row">
            <div class="col-75 loginText">
                <input type="text" id="password" name="password" placeholder="Your password.." required />
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
            Login with Facebook
        </button>
    </div>
    <div class="button-center">
        <button class="btn google">
            <i class="fa fa-google"></i>
            Login with Google
        </button>
    </div>
    <div class="button-center">
        <button class="btn twitter">
            <i class="fa fa-twitter"></i>
            Login with Twitter
        </button>
    </div>

</div>