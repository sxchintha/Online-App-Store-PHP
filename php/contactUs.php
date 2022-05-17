<?php
session_start();
include './components/newNav.php';
?>

<style>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/contact.css';
  ?>
</style>


<h1 class="contact-heading">Help and Contact</h1>
<div class="search">
  <div class="wrapper">
    <input type="text" class="input" placeholder="What are you looking for?" />
    <div class="searchbtn"><i class="fas fa-search"></i></div>
  </div>
</div>
<div class="allCards">
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="../img/Contact/newF.gif" alt="Avatar" class="img" />
        <h3 class="crd-title">New Features</h3>
        <br />
        <ul>
          <li>New things about kilck store</li>
          <br />
          <li>New things about kilck store</li>
          <br />
          <li>New things about kilck store</li>
        </ul>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../img/Contact/forUsers.gif" alt="Avatar" class="img" />
        <h3 class="crd-title">For Users</h3>
        <br />
        <ul>
          <li>New things about kilck store</li>
          <br />
          <li>New things about kilck store</li>
          <br />
          <li>New things about kilck store</li>
        </ul>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="../img/Contact/devloper.gif" alt="Avatar" class="img" />
        <h3 class="crd-title">For Developer</h3>
        <br />
        <ul>
          <li>New things about kilck store</li>
          <br />
          <li>New things about kilck store</li>
          <br />
          <li>New things about kilck store</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="button-div">
  <p class="btnP"><a href="#" class="btnn anim">Chat With Us</a></p>
</div>

<?php
include './components/footerNew.php';
?>