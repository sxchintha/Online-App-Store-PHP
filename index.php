<?php
session_start();
include './php/components/newNav.php';
require './php/db/config.php';

// Get 5 latest updated apps
$newappssql = "SELECT idapp, title, imagename, stars, ratecount
                    FROM app 
                    ORDER BY lastupdated DESC 
                    LIMIT 5";

// Get 5 apps where the category is communication
$socialappssql = "SELECT idapp, title, imagename, stars, ratecount
                        FROM app 
                        where category = 'Communication'
                        ORDER BY idapp DESC 
                        LIMIT 5";

// Get 5 random apps
$recommendedsql = "SELECT idapp, title, imagename, stars, ratecount
                        FROM app AS r1 JOIN
                        (SELECT CEIL(RAND() *
                        (SELECT MAX(idapp)
                        FROM app)) AS id)
                        AS r2
                        WHERE r1.idapp >= r2.id
                        ORDER BY r1.idapp ASC
                        LIMIT 5";

$newapps = mysqli_query($con, $newappssql);
$socialapps = mysqli_query($con, $socialappssql);
$recommendeds = mysqli_query($con, $recommendedsql);


?>
<style>
    .checked {
        color: orange;
    }

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/index.css';
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/newCard.css';
    ?>
</style>

<body>
    <?php
    include './php/components/slider.php'
    ?>

    <a href="/store/online-app-store-php/php/search.php?search=newupdate">
        <h1 class="index-header">New + Update</h1>
    </a>

    <section>
        <?php
        while ($app = $newapps->fetch_assoc()) {
            include './php/components/newCard.php';
        }
        ?>
    </section>
    <br>
    <a href="/store/online-app-store-php/php/search.php?search=communication">
        <h1 class="index-header">Social Networks</h1>
    </a>
    <section>
        <?php
        while ($app = $socialapps->fetch_assoc()) {
            include './php/components/newCard.php';
        }
        ?>
    </section>
    <br>
    <img src="img/Slides/banner.jpg" alt="" class="index-banner">
    <a href="/store/online-app-store-php/php/search.php?search=recomended">
        <h1 class="index-header">Recommended for you</h1>
    </a>
    <section>
        <?php
        while ($app = $recommendeds->fetch_assoc()) {
            include './php/components/newCard.php';
        }
        ?>
    </section>

    <?php
    include './php/components/footerNew.php';
    ?>