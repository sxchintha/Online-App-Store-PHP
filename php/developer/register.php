<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
  ?>
</style>

<!-- Fonts, Icons & Search button -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
  <h2 class="user-form-title">Create new developer account</h2><br />
  <form action="action_page.php">
    <div class="row">
      <div class="col-25">
        <label for="fname">First Name:</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Your  first name.." required />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Last Name:</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Email:</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="Your email.." required />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Password:</label>
      </div>
      <div class="col-75">
        <input type="text" id="password" name="password" placeholder="Your password.." required />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Confirm Password:</label>
      </div>
      <div class="col-75">
        <input type="text" id="cpassword" name="cpassword" placeholder="Enter password again.." required />
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Contact No:</label>
      </div>
      <div class="col-75">
        <input type="text" id="contact" name="contact" placeholder="Contact No.." required />
      </div>
    </div>

    <span></span>
    <div class="row">
      <div class="col-25">
        <label for="fname"></label>
      </div>
      <!-- <div class="col-75">
              <p>
              </p>
            </div> -->
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname"></label>
      </div>
      <div class="col-75">
        <input type="checkbox" name="tnc" style="margin-bottom: 15px" />
        Accept Terms and Conditions
      </div>
    </div>
    <div class="row">
      <div class="col-25"></div>
      <div class="col-75">
        <button class="submit">Submit</button>
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