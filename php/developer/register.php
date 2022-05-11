<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/css/form.css';
    ?>
</style>


<div class="container">
        <h2 class="user-form-title">Create A New Account</h2>
        <form action="action_page.php">
          <div class="row">
            <div class="col-25">
              <label for="fname">First Name:</label>
            </div>
            <div class="col-75">
              <input
                type="text"
                id="fname"
                name="firstname"
                placeholder="Your  first name.."
              />
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lname">Last Name:</label>
            </div>
            <div class="col-75">
              <input
                type="text"
                id="lname"
                name="lastname"
                placeholder="Your last name.."
                required
              />
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Email:</label>
            </div>
            <div class="col-75">
              <input
                type="text"
                id="fname"
                name="firstname"
                placeholder="Your email.."
              />
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Password:</label>
            </div>
            <div class="col-75">
              <input
                type="text"
                id="fname"
                name="firstname"
                placeholder="Your password.."
              />
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Confirm Password:</label>
            </div>
            <div class="col-75">
              <input
                type="text"
                id="fname"
                name="firstname"
                placeholder="Enter password again.."
              />
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Contact No:</label>
            </div>
            <div class="col-75">
              <input
                type="text"
                id="fname"
                name="firstname"
                placeholder="Contact No.."
              />
            </div>
          </div>
          
          <span></span>
          <div class="row">
            <div class="col-25">
              <label for="fname"></label>
            </div>
            <div class="col-75">
              <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Laborum odio, incidunt autem dolores non, et praesentium quas
                voluptatum velit at possimus voluptas nostrum! Autem atque
                consequuntur modi nemo voluptas. Deleniti.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname"></label>
            </div>
            <div class="col-75">
              <input
                type="checkbox"
                checked="checked"
                name="remember"
                style="margin-bottom: 15px"
              />
              Accept Terms and Conditions
            </div>
          </div>
          <div class="row">
            <div class="col-25"></div>
            <div class="col-75">
              <button class="submit">Submit</button>
            </div>
          </div>
          <div class="hr-line">
            <span class="line-text">OR</span>
          </div>
          <div class="button-center">
          <button class="facebook"><a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
        </a></button>
          </div>

          <div class="button-center">
          <button class="google"><a href="#" class="fb btn">
          <i class="fa fa-google fa-fw"></i> Login with Google+
        </a></button>
          </div>

          <div class="button-center">
          <button class="twitter"><a href="#" class="fb btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a></button>
          </div>
          
          
          </div>
        </form>