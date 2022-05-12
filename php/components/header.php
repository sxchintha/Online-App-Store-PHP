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
        <li><a href="#">Home</a></li>
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
        <input type="text" placeholder="Search">
        <div class="icon">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <!-- login/profile button -->
    <div class="licon">
        <li>
            <a href="#">
                <i class="fas fa-user-circle
                        fa-2x" style="color: white;">
                </i>
            </a>
        </li>
    </div>
</nav>