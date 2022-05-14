<div class="card">
  <img src="./uploads/images/<?php echo $app['imagename'] ?>" alt="Avatar" style="width: 100%" class="img" />
  <div class="container">
    <h4 class="card-title"><b><?php echo $app['title'] ?></b></h4>
    <p>Rating: 
      <?php 
        if($app['ratecount'] == 0) {
          echo 0;
        } else {
          echo round($app['stars']/$app['ratecount'], 1);
        }
      ?>
    </p>
  </div>
</div>