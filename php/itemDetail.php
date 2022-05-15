 <?php
session_start();
include './components/newNav.php';
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
                <img
                  src="https://cdn.pixabay.com/photo/2017/12/10/14/47/pizza-3010062__340.jpg"
                />
                <figcaption>Downloads :</figcaption>
              </figure>
              <div class="card-body">
                <h2 class="card-title">Facebook</h2>
              </div>
            </article>
          </a>
        </section>
      </div>
      <div class="flex-child second">
        <h1 class="item-title">Item Title</h1>
        <ul>
          <li>Item price</li>
          <li>description</li>
          <li>Publish date</li>
        </ul>
      </div>
    </div>
    <div class="review-container">
      <h1 class="review-title">Ratings and reviews</h1>
    </div>