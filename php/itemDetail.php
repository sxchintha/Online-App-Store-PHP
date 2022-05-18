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
      include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/newCard.css';
      include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/itemDetails.css';
      ?>
   </style>



   <div class="flex-container">
     <div class="flex child">
       <section>
         <a href="#">
           <article class="card">
             <figure class="card-img">
               <img src="../uploads/images/<?php echo $app['imagename'] ?>" />
               <figcaption>Downloads: <?php echo $app['downloads'] ?></figcaption>
             </figure>
             <div class="card-body">
               <h2 class="card-title"><?php echo $app['title'] ?></h2>
             </div>
           </article>
         </a>
       </section>
     </div>
     <div class="flex-child second">
       <h1 class="item-title"><?php echo $app['title'] ?></h1>
       <p><?php echo $app['description'] ?></p>
       <ul>
         <li>Item price</li>
         <li>Type: <?php echo $app['type'] ?></li>
         <li>Category: <?php echo $app['category'] ?></li>
         <li>Language: <?php echo $app['language'] ?></li>
         <li>Size: <?php echo round($app['filesize'] / 1000000, 2) ?> MB</li>
         <li>Downloads: <?php echo $app['downloads'] ?></li>
         <li>Rating: <?php if ($app['ratecount'] == 0) {
                        echo 0;
                      } else {
                        echo round($app['stars'] / $app['ratecount'], 1);
                      } ?></li>
         <li>Website: <?php echo $app['website'] ?></li>
         <li>Email: <?php echo $app['email'] ?></li>
         <li>Contact: <?php echo $app['contact'] ?></li>
         <li>Last updated on: <?php echo $app['lastupdated'] ?></li>
         <li>Posted on: <?php echo $app['posteddate'] ?></li>
       </ul>


       <!-- If app is free, show download button
            otherwise show app price -->
       <?php
        if ($app['price'] == 0) {
          echo '
          <form action="./actions/downloadfile.php" method="POST">
            <input type="hidden" name="itemid" value="' . $itemid . '">
            <input type="submit" value="Download">
          </form>
          ';
        } else if (empty($_SESSION["SID"])) {
          echo '
            <form action="./payment.php" method="POST">
              <input type="hidden" name="itemid" value="' . $itemid . '">
              <input type="submit" value="$' . $app['price'] . '">
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
              <input type="submit" value="$' . $app['price'] . '">
            </form>
            ';
          } else {
            echo '
            <form action="./actions/downloadfile.php" method="POST">
              <input type="hidden" name="itemid" value="' . $itemid . '">
              <input type="submit" value="Download">
            </form>
            ';
          }
        }
        ?>
     </div>
   </div>
   <div class="review-container">
     <h1 class="review-title">Ratings and reviews</h1>
     <a href="./reviewForm.php?itemid=<?php echo $itemid ?>">Rate app</a>
     <br><br>
   </div>

 <?php } ?>


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

   <h1><?php echo $review['subject']; ?></h1> <!-- For Review title subject -->
   <p><?php echo $user['fname'] . ' ' . $user['lname'] ?></p> <!-- for the name of the reviewer -->
   <p><?php echo $review['country'] ?></p> <!-- for Country of the reviewer -->
   <p>Rating: <?php echo $review['rating'] ?></p> <!-- for Rating -->
   <p><?php echo $review['comment'] ?></p><!-- for Comment -->
 <?php
  }
  ?>

 <?php
include './components/footerNew.php';
  ?>