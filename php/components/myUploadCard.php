 <style>
   <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/myUploadCard.css';
    ?>
 </style>



 <a href="/store/online-app-store-php/php/editapp.php?itemid=<?php echo $app['idapp'] ?>">
   <article class="card">
     <figure class="card-img">
       <img src="../uploads/images/<?php echo $app['imagename'] ?>" />

       <figcaption>Downloads : <?php echo $app['downloads'] ?></figcaption>

     </figure>
     <div class="card-body">
       <h2 class="card-title"><?php echo $app['title'] ?></h2>
       <button class="edit-button">Edit</button>
       <button class="delete-button">Delete</button>
     </div>
   </article>
 </a>