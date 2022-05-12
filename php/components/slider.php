<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/slides.css';
  ?>
</style>
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<div class="slideshow-container">
  <div class="mySlides w3-animate-right">
    <img src="img/Slides/slide1.jpg" style="width: 100%" />
  </div>

  <div class="mySlides w3-animate-right">
    <img src="img/Slides/slide2.jpg" style="width: 100%" />
  </div>

  <div class="mySlides w3-animate-right">
    <img src="img/Slides/slide3.jpg" style="width: 100%" />
  </div>
</div>
<br />

<div style="text-align: center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<footer>
  <p>About Us<br /></p>
</footer>
<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
      slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
  };
</script>