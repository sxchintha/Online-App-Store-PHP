<?php
session_start();
include './components/newNav.php';

// include the database config file
include_once './db/config.php';


if (empty($_GET['itemid'])) {
  echo "<script>window.location.href = './404.php';</script>";
  exit;
}
// Get item id
$itemid = $_GET['itemid'];

$sql = "select * from app where idapp = $itemid";
$result = $con->query($sql);

if ($result->num_rows == 1) {
  $app = $result->fetch_assoc();

?>

  <style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/pDetailCard.css';
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/productDetails.css';
    ?>
  </style>


  <div class="detail-body">
    <main class="container">
      <div class="left-column">
        <section>
          
            <article class="card">
              <figure class="card-img">
                <img src="../uploads/images/<?php echo $app['imagename'] ?>" />
                <figcaption>Downloads : <?php echo $app['downloads'] ?></figcaption>
              </figure>
              <div class="card-body">
                <h2 class="card-title"><?php echo $app['title'] ?></h2>
                <a href="./reviewForm.php?itemid=<?php echo $itemid ?>" class="edit-button">Rate app</a>
              </div>
            </article>
         
        </section>
      </div>

      <!-- Right Column -->
      <div class="right-column">
        <!-- Product Description -->
        <div class="product-description">
          <span><?php echo $app['category'] ?></span>
          <h1><?php echo $app['title'] ?></h1>
          <p><?php echo $app['description'] ?></p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Type: <?php echo $app['type'] ?></span><br>
            <span>Category: <?php echo $app['category'] ?></span><br>
            <span>Language: <?php echo $app['language'] ?></span><br>
            <span>Size: <?php echo round($app['filesize'] / 1000000, 2) ?> MB</span><br>
            <span>Downloads: <?php echo $app['downloads'] ?></span><br>
            <span>Rating: <?php if ($app['ratecount'] == 0) {
                            echo 0;
                          } else {
                            echo round($app['stars'] / $app['ratecount'], 1);
                          } ?></span><br><br>
            <span>Website: <?php echo $app['website'] ?></span><br>
            <span>Email: <?php echo $app['email'] ?></span><br>
            <span>Contact: <?php echo $app['contact'] ?></span><br><br>
            <!-- date_format($date,"Y/m/d H:i:s") -->
            <span>Last updated on: <?php
                                    $udate = date_create($app['lastupdated']);
                                    echo date_format($udate, "Y-m-d");
                                    ?>
            </span><br>
            <span>Posted on: <?php
                              $udate = date_create($app['posteddate']);
                              echo date_format($udate, "Y-m-d");
                              ?></span><br>

          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
          <!-- If app is free, show download button
            otherwise show app price -->
          <?php
          if ($app['price'] == 0) {
            echo '
          <form action="./actions/downloadfile.php" method="POST">
            <input type="hidden" name="itemid" value="' . $itemid . '">
            <input type="submit" value="Download"  class="cart-btn">
          </form>
          ';
          } else if (empty($_SESSION["SID"])) {
            echo '
            <form action="./payment.php" method="POST">
              <input type="hidden" name="itemid" value="' . $itemid . '">
              <input type="submit" class="cart-btn" value="$' . $app['price'] . '">
            </form>
            ';
          } else {
            $userid = $_SESSION['SID'];
            $userrole = $_SESSION['role'];
            $checkPayed = "SELECT EXISTS(SELECT * from payment WHERE appid=$itemid and userid=$userid and userrole='$userrole') as paid";
            $result = mysqli_fetch_assoc(mysqli_query($con, $checkPayed));

            if ($result['paid'] == 0) {
              echo '
            <form action="./payment.php" method="POST">
              <input type="hidden" name="itemid" value="' . $itemid . '">
              <input type="submit" class="cart-btn" value="$' . $app['price'] . '">
            </form>
            ';
            } else {
              echo '
            <form action="./actions/downloadfile.php" method="POST">
              <input type="hidden" name="itemid" value="' . $itemid . '">
              <input type="submit" class="cart-btn" value="Download">
            </form>
            ';
            }
          }
          ?>
        </div>
      </div>
    </main>
    <h1 class="rating-title">Ratings and Reviews</h1>
    <!-- Get item reviews -->
    <?php

    $reviewsql = "SELECT userid, `subject`, country, rating, comment, userrole
            FROM appreview
            WHERE appid = $itemid;";

    $reviews = mysqli_query($con, $reviewsql);

    while ($review = $reviews->fetch_assoc()) {
      $reviewerid = $review['userid'];
      if ($review['userrole'] == 'user') {
        $usersql = "SELECT fname, lname
              FROM customer
              WHERE idcustomer = $reviewerid";
      } else {
        $usersql = "SELECT fname, lname
              FROM developer
              WHERE iddeveloper = $reviewerid";
      }
      $userdetails = $con->query($usersql);
      $user = $userdetails->fetch_assoc();
    ?>
      <div class="Rcard">
        <h3><?php echo $review['subject']; ?></h3>
        <h4>by - <?php echo $user['fname'] . ' ' . $user['lname'] ?></h4>
        <h4><?php echo $review['country'] ?></h4>
        <h4>Rating: <?php echo $review['rating'] ?></h4>
        <h4>Comment: <?php echo $review['comment'] ?></h4>
      </div>
    <?php
    }
    ?>
  </div>
<?php } else {
  echo "<script>window.location.href = './404.php';</script>";
  exit;
} ?>