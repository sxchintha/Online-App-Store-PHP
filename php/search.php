<?php
session_start();
include './components/newNav.php';
require './db/config.php';
?>

<style>
    .checked {
        color: orange;
    }

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/search.css';
    ?>
</style>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
    $search = trim($_GET['search']);

    if ($_GET['search'] == 'newupdate') {
        $sql = "SELECT idapp, title, imagename, stars, ratecount
                    FROM app 
                    ORDER BY lastupdated DESC 
                    LIMIT 25";
    } else if ($_GET['search'] == 'recomended') {
        $sql = "SELECT idapp, title, imagename, stars, ratecount
                        FROM app AS r1 JOIN
                        (SELECT CEIL(RAND() *
                        (SELECT MAX(idapp)
                        FROM app)) AS id)
                        AS r2
                        WHERE r1.idapp >= r2.id
                        ORDER BY r1.idapp ASC
                        LIMIT 25";
    } else {
        $sql = "SELECT idapp, title, imagename, stars, ratecount
                FROM app
                WHERE title LIKE '%" . $search . "%'
                OR category LIKE '%" . $search . "%'";
    }

    $apps = mysqli_query($con, $sql);

    if (mysqli_num_rows($apps) > 0) {
?>
        <section>
            <?php

            while ($app = $apps->fetch_assoc()) {
                include './components/searchCard.php';
            }
            ?>
        </section>
    <?php

    } else {
    ?>
        <!-- purple x moss 2020 -->

        <head>
            <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
            <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
        </head>

        <body>
            <div class="mainbox">
                <!-- <div class="err">4</div> -->
                <i class="far fa-question-circle fa-spin"></i>
                <!-- <div class="err2">4</div> -->
                <div class="msg">Search not found...</p>
                </div>
            </div>
    <?php
    }
} else {
    echo "<script>window.location.href = '../index.php';</script>";
}
    ?>


    <?php
    include './components/footerNew.php';
    ?>