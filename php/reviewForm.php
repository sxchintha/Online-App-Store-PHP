<?php
session_start();
include './components/header.php';
?>

<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/reviewForm.css';
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/form.css';
    ?>
</style>

<div class="review-body">
      <h1 class="review-title">Ratings and Reviews</h1>
      <div class="Rcard">
        <div class="card-details">
          <input
            type="text"
            id="fname"
            name="firstname"
            placeholder="Name :"
            class="rating-input"
          />

          <br /><br />
          <input
            type="text"
            id="fname"
            name="firstname"
            placeholder="Email :"
            class="rating-input"
          />

          <br /><br />
          <input
            type="text"
            id="fname"
            name="firstname"
            placeholder="Subject :"
            class="rating-input"
          />

          <br /><br />

          <select name="category" id="category" class="rating-input" required>
            <option value="" disabled selected hidden>Select Country</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="India">India</option>
            <option value="China">China</option>
            <option value="Switzerland">Switzerland</option>
          </select>

          <br /><br />

          <select name="category" id="category" class="rating-input" required>
            <option value="" disabled selected hidden>
              Select Feedback Type
            </option>
            <option value="Banking">Banking</option>
            <option value="Communication">Communication</option>
            <option value="Game">Game</option>
            <option value="Productivity">Productivity</option>
          </select>
          <br /><br />
          <select name="category" id="category" class="rating-input" required>
            <option value="" disabled selected hidden>Select Rating</option>
            <option value="Banking">1 star</option>
            <option value="Communication">2 star</option>
            <option value="Game">3 star</option>
            <option value="Productivity">4 star</option>
            <option value="Productivity">
              5 star
            </option>
          </select>
          <br /><br />
          <textarea
            class="review-textA"
            name="comment"
            id=""
            cols="30"
            rows="10"
            placeholder="Comments :"
          ></textarea>
          <br /><br />
          <div class="center">
            <button class="publish-button">Publish</button>
          </div>
        </div>
      </div>
    </div>