<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/newCard.css';
  ?>
</style>

<a href="/store/online-app-store-php/php/newProductDetails.php?itemid=<?php echo $app['idapp'] ?>">
  <article class="card">
    <figure class="card-img">
      <img src="../uploads/images/<?php echo $app['imagename'] ?>" />

    </figure>
    <div class="card-body">
      <h2 class="card-title"><?php echo $app['title'] ?></h2>
      <p class="card-text">
        Rating:
        <?php
        if ($app['ratecount'] == 0) {
          $rating = 0;
          // echo 0;
        } else {
          $rating = round($app['stars'] / $app['ratecount'], 1);
          // echo round($app['stars'] / $app['ratecount'], 1);
        }
        $star = 0;
        if ($rating == 0) {
        ?>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <?php
        } else {

          while ($star < 5) {
            if ($star < $rating) {
          ?>
              <span class="fa fa-star checked"></span>
            <?php
            } else {
            ?>
              <span class="fa fa-star"></span>
        <?php
            }
            $star = $star + 1;
          }
        }
        ?>
      </p>
    </div>
  </article>
</a>