<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KLICK STORE</title>
</head>

<body>

  <style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/newNav.css';
    ?>
  </style>

  <!-- font awesome link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

  <header class="headAll">
    <div class="header-1">
      <a href="/store/online-app-store-php/" class="logo"><i class="fas fa-store"></i>KLICK STORE</a>

      <form action="/store/online-app-store-php/php/search.php" class="search-box-container">
        <input type="search" name="search" id="search-box" placeholder="Search here..." />
        <button style="border: 0px; padding: 0px; margin: 0px;">
          <label for="search-box" class="fas fa-search"></label>
        </button>
      </form>
    </div>

    <div class="header-2" id="header-2">
      <div id="menu-bar" class="fas fa-bars"></div>

      <nav class="navbar" id="navbar">
        <a href="/store/online-app-store-php/">Home</a>
        <a href="/store/online-app-store-php/php/search.php?search=communication">Communication</a>
        <a href="/store/online-app-store-php/php/search.php?search=banking">Banking</a>
        <a href="/store/online-app-store-php/php/search.php?search=game">Game</a>
        <a href="/store/online-app-store-php/php/search.php?search=productivity">Productivity</a>
        <a href="/store/online-app-store-php/contactUs.php">Contact Us</a>
      </nav>
      <!-- login/profile button -->
      <div class="icons">
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && !empty($_SESSION["SID"])) {
          echo '
            <a href="/store/online-app-store-php/php/profile.php" class="fas fa-user-circle"></a>
            <a href="/store/online-app-store-php/php/actions/logout.php" class="btn">Logout</a>
            ';
        } else {
          echo '
            <a href="/store/online-app-store-php/php/login.php" class="btn">login</a>
            ';
        }
        ?>
      </div>
    </div>
  </header>

  <!-- custom js link  -->
  <script>
    let menu = document.getElementById('menu-bar');
    let navbar = document.getElementById('navbar');
    let header = document.getElementById('header-2');

    menu.addEventListener('click', () => {
      menu.classList.toggle('fa-times');
      navbar.classList.toggle('active');
    });

    window.onscroll = () => {
      menu.classList.remove('fa-times');
      navbar.classList.remove('active');

      if (window.scrollY > 100) {
        header.classList.add('active');
      } else {
        header.classList.remove('active');
      }

    }
  </script>