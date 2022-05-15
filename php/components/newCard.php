<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/newCard.css';
  ?>
</style>

<a href="/store/online-app-store-php/php/itemDetail.php?itemid=<?php echo $app['idapp'] ?>">
  <article class="card">
    <figure class="card-img">
      <img src="./uploads/images/<?php echo $app['imagename'] ?>" />

    </figure>
    <div class="card-body">
      <h2 class="card-title"><?php echo $app['title'] ?></h2>
      <p class="card-text">
        Rating:
        <?php
        if ($app['ratecount'] == 0) {
          echo 0;
        } else {
          echo round($app['stars'] / $app['ratecount'], 1);
        }
        ?>
      </p>
    </div>
  </article>
</a>
