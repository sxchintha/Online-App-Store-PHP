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

<body>
    <?php
    include './php/components/slider.php'
    ?>

    <h1>New + Update</h1>
    <section>
        <?php
        while ($app = $newapps->fetch_assoc()) {
            include './php/components/newCard.php';
        }
        ?>
    </section>
    <br>

    <h1>Social Networks</h1>
    <section>
        <?php
        while ($app = $socialapps->fetch_assoc()) {
            include './php/components/newCard.php';
        }
        ?>
    </section>
    <br>
    <img src="img/Slides/banner.jpg" alt="">
    <h1>Recommended for you</h1>
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