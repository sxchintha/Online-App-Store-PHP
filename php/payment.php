<?php
session_start();
include './components/newNav.php';

// Check login status
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true && empty($_SESSION["SID"])) {
  echo "<script>window.location.href = './login.php';</script>";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['itemid'])) {
  echo "<script>window.location.href = './404.php';</script>";
  exit;
}
?>

<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/payment.css';
  ?>
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

<div class="Rcard">
  <div class="body">
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="./actions/payment.php" method="POST">
            <input type="hidden" name="itemid" value="<?php echo $_POST['itemid'] ?>">
            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="name"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="name" name="name" placeholder="Full Name" required />
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" placeholder="john@example.com" required />
                <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="address" name="address" placeholder="542 W. 15th Street" required />
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York" required />

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY" required />
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="number" id="zip" name="zip" placeholder="10001" required />
                  </div>
                </div>
              </div>

              <div class="col-50">
                <h3>Payment</h3>
                <label for="cards">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa ss" style="color: navy"></i>
                  <i class="fa fa-cc-amex" style="color: blue"></i>
                  <i class="fa fa-cc-mastercard" style="color: red"></i>
                  <i class="fa fa-cc-discover" style="color: orange"></i>
                </div>
                <label for="cardname">Name on Card</label>
                <input type="text" id="cardname" name="cardname" placeholder="Card Holder Name" required />
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required />
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September" required />
                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2022" required />
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="number" id="cvv" name="cvv" placeholder="352" required />
                  </div>
                </div>
              </div>
            </div>
            <label>
              <input type="checkbox" checked="checked" name="terms" required />
              Accept terms and conditions
            </label>
            <input type="submit" value="PAY" class="btn" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include './components/footerNew.php';
?>