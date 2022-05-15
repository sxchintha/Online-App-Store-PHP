<?php
session_start();
include './php/components/newNav.php';
require './php/db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
    echo $_GET['search'];
} else {

    // Get 5 latest updated apps
    $newappssql = "SELECT title, imagename, stars, ratecount
                    FROM app 
                    ORDER BY lastupdated DESC 
                    LIMIT 5";

    // Get 5 apps where the category is communication
    $socialappssql = "SELECT title, imagename, stars, ratecount
                        FROM app 
                        where category = 'Communication'
                        ORDER BY idapp DESC 
                        LIMIT 5";

    // Get 5 random apps
    $recommendedsql = "SELECT title, imagename, stars, ratecount
                        FROM app AS r1 JOIN
                        (SELECT CEIL(RAND() *
                        (SELECT MAX(idapp)
                        FROM app)) AS idapp)
                        AS r2
                        WHERE r1.idapp >= r2.idapp
                        ORDER BY r1.idapp ASC
                        LIMIT 5";

    $newapps = mysqli_query($con, $newappssql);
    $socialapps = mysqli_query($con, $socialappssql);
    $recommendeds = mysqli_query($con, $recommendedsql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./css/main.css"> -->
    <title>Klick Store</title>
</head>

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

    <h1>Recommended for you</h1>
    <section>
    <?php
    while ($app = $recommendeds->fetch_assoc()) {
       include './php/components/newCard.php';
    }
    ?>
    </section>
</body>

</html>