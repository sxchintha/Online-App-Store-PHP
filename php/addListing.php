<?php
session_start();
include './components/newNav.php';
?>

<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/adListing.css';
  ?>
</style>

<h1 class="add-listing-heading">Store Listing</h1><br />
<form class="listing-form" method="POST" action="actions/addListing.php" enctype="multipart/form-data">
  <div class="form-content">
    <br />
    <h3>Categorization</h3>
    <br />
    <div class="border">
      <div class="row">
        <div class="col-25">
          <label for="application type">Application Type :</label>
        </div>
        <div class="col-75">
          <select name="applicationtype" id="applicationtype" required>
            <option value="" disabled selected hidden>Choose type</option>
            <option value="PC">PC</option>
            <option value="Mobile">Mobile</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="category">Category :</label>
        </div>
        <div class="col-75">
          <select name="category" id="category" required>
            <option value="" disabled selected hidden>Choose category</option>
            <option value="Banking">Banking</option>
            <option value="Communication">Communication</option>
            <option value="Game">Game</option>
            <option value="Productivity">Productivity</option>
          </select>
        </div>
      </div>
    </div><br />

    <h3>Upload Application</h3><br />
    <div class="border">
      <div class="upApk">
        <label for="title">Title</label><br />
        <input type="text" class="title-box" name="title" required /><br /><br />
        <label for="description">Description</label><br />
        <textarea class="description-box" name="description" required></textarea><br /><br />
        <label>Default Language</label><br />
        <select name="language" id="language" required>
          <option value="" disabled selected hidden>Choose language</option>
          <option value="English">English</option>
          <option value="Sinhala">Sinhala</option>
        </select><br /><br />
        <label for="Price">Price</label><br>
        <input type="radio" id="freeradio" name="price" value="free"  onchange="setFree()"><label for="pric" checked>Free</label>
        <input type="radio" id="paidradio" name="price" value="paid" onchange="setPrice()"><label for="pric">Paid</label>
        <input type="number" id="appprice" name="appprice" required class="title-box" value="0" >
        <br><br>
        <label>Image</label><br />
        <input type="file" id="imageToUpload" name="imageToUpload" required /><br /><br />
        <label>Upload APK</label><br />
        <input type="file" id="fileToUpload" name="fileToUpload" required /><br />
      </div>
    </div><br />

    <h3>Contact Details</h3>
    <br />
    <div class="border">
      <div class="row">
        <div class="col-25">
          <label for="website">Website :</label>
        </div>
        <div class="col-75">
          <input type="text" class="title-box" name="website" />
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="email">E-mail:</label>
        </div>
        <div class="col-75">
          <input type="email" class="title-box" name="email" required />
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="cotact">Contact No. :</label>
        </div>
        <div class="col-75">
          <input type="tel" class="title-box" name="contact" pattern="[0-9]{10}" required />
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="center">
    <button class="publish-button">Publish</button>
  </div>
</form>

<script>
  var freebtn = document.getElementById('freeradio').checked
  var appprice = document.getElementById('appprice').disabled

  function setFree() {
    document.getElementById("appprice").disabled = true;
  }
  function setPrice() {
    document.getElementById("appprice").disabled = false;
  }
</script>