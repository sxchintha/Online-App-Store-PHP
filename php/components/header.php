<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/header.css';
    ?>
</style>

<!-- Fonts, Icons & Search button -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    $(document).ready(function() {
        $(".fa-search").click(function() {
            $(".icon").toggleClass("active");
            $("input[type='text']").toggleClass("active");
        });
    });
</script>


<nav>
    <div class="logo">
        Klick Store
    </div>

    <div class="nav-items button-center">

        <!-- The Menu items -->
        <li><a href="/store/online-app-store-php/">Home</a></li>
        <li>
            <div class="dropdown">
                Categories
                <i class="fa fa-caret-down"></i>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
        </li>
        <li>
            <div class="dropdown">
                Apps
                <i class="fa fa-caret-down"></i>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
        </li>
        <li><a href="#">Today</a></li>
        <li><a href="#">New Releases</a></li>
        <li>
            <div class="dropdown">
                More
                <i class="fa fa-caret-down"></i>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
        </li>
    </div>

    <!-- search bars -->
    <div class="searchbar">
        <input type="text" placeholder="Search" name="search">
        <div class="icon">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <!-- login/profile button -->
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && !empty($_SESSION["SID"])) {
        echo '
            <div class="licon">
                <li>
                    <a href="/store/online-app-store-php/php/profile.php">
                        <i class="fas fa-user-circle
                                fa-2x" style="color: white;">
                        </i>
                    </a>
                </li>
            </div>
            <div class="borderLog">
                <li>
                    <a href="/store/online-app-store-php/php/actions/logout.php">Logout</a>
                </li>
            </div>
            ';
    } else {
        echo '
            <div class="borderLog" style="padding-left: 15px">
                <li>
                    <a href="/store/online-app-store-php/php/login.php">Login</a>
                </li>
            </div>
            ';
    }


    ?>
</nav>