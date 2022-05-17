<?php
session_start();
include './components/newNav.php';
require './db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['search'])) {
    $search = trim($_GET['search']);

    $sql = "SELECT idapp, title, imagename, stars, ratecount
            FROM app
            WHERE title LIKE '%" . $search . "%'";

    $apps = mysqli_query($con, $sql);
?>
    <section>
    <?php

    while ($app = $apps->fetch_assoc()) {
        include './components/searchCard.php';
    }
} else {
    echo "<script>window.location.href = '../index.php';</script>";
}
    ?>
    </section>