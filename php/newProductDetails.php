 <?php

session_start();
include './components/header.php';




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
            <a href="#">
              <article class="card">
                <figure class="card-img">
                  <img src="slide1.jpg" />
                  <figcaption>Downloads :</figcaption>
                </figure>
                <div class="card-body">
                  <h2 class="card-title">Facebook</h2>

                  <button class="edit-button">Add Rating</button>
                </div>
              </article>
            </a>
          </section>
        </div>

        <!-- Right Column -->
        <div class="right-column">
          <!-- Product Description -->
          <div class="product-description">
            <span>Category</span>
            <h1>Item TITle</h1>
            <p>Item description</p>
          </div>

          <!-- Product Configuration -->
          <div class="product-configuration">
            <!-- Product Color -->

            <!-- Cable Configuration -->
            <div class="cable-config">
              <span>Cable configuration</span>

              <div class="cable-choose">
                <button>Straight</button>
                <button>Coiled</button>
                <button>Long-coiled</button>
              </div>

              <a href="#">How to configurate your headphones</a>
            </div>
          </div>

          <!-- Product Pricing -->
          <div class="product-price">
            <span>148$</span>
            <a href="#" class="cart-btn">Buy Now</a>
          </div>
        </div>
      </main>
      <h1 class="rating-title">Ratings and Reviews</h1>
      <div class="Rcard">
        <h4>Rating by -</h4>
        <h4>Comment -</h4>
        <h4>Date -</h4>
      </div>
    </div>