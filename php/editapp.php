<?php
session_start();
include './components/newNav.php';

// include the database config file
include_once './db/config.php';

if (empty($_GET['itemid'])) {
    echo "<script>window.location.href = './404.php';</script>";
    exit;
}
// Get item id
$itemid = $_GET['itemid'];
$userid = $_SESSION['SID'];

$sql = "select * from app where idapp = $itemid and developer = $userid";
$result = $con->query($sql);

if ($result->num_rows == 1) {
    $app = $result->fetch_assoc();

?>

    <style>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/adListing.css';
        ?>
    </style>

    <h1 class="add-listing-heading">Update Listing</h1><br />
    <form class="listing-form" method="POST" action="actions/updateapp.php" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $itemid; ?>" name="itemid">
        <div class="form-content">
            <br />
            <h3>Categorization</h3>
            <br />
            <div class="border">
                <div class="row">
                    <div class="col-25">
                        <label for="application type">Application Type :</label>
                    </div>
                    <div class="col-75">
                        <select name="applicationtype" id="applicationtype" required>
                            <option value="" disabled selected hidden>Choose type</option>
                            <option value="PC">PC</option>
                            <option value="Mobile">Mobile</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="category">Category :</label>
                    </div>
                    <div class="col-75">
                        <select name="category" id="category" required>
                            <option value="" disabled selected hidden>Choose category</option>
                            <option value="Banking">Banking</option>
                            <option value="Communication">Communication</option>
                            <option value="Game">Game</option>
                            <option value="Productivity">Productivity</option>
                        </select>
                    </div>
                </div>
            </div><br />

            <h3>Upload Application</h3><br />
            <div class="border">
                <div class="upApk">
                    <label for="title">Title</label><br />
                    <input type="text" class="title-box" name="title" required value="<?php echo $app['title'] ?>" /><br /><br />
                    <label for="description">Description</label><br />
                    <textarea class="description-box" name="description" id="description" required></textarea><br /><br />
                    <label>Default Language</label><br />
                    <select name="language" id="language" required>
                        <option value="" disabled selected hidden>Choose language</option>
                        <option value="English">English</option>
                        <option value="Sinhala">Sinhala</option>
                    </select><br /><br />
                    <label for="Price">Price</label><br>
                    <input type="radio" id="freeradio" name="price" value="free" onchange="setFree()"><label for="pric" checked>Free</label>
                    <input type="radio" id="paidradio" name="price" value="paid" onchange="setPrice()"><label for="pric">Paid</label>
                    <input type="number" id="appprice" name="appprice" required class="title-box" value="<?php echo $app['price'] ?>">
                    <br><br>
                </div>
            </div><br />

            <h3>Contact Details</h3>
            <br />
            <div class="border">
                <div class="row">
                    <div class="col-25">
                        <label for="website">Website :</label>
                    </div>
                    <div class="col-75">
                        <input type="text" class="title-box" name="website" value="<?php echo $app['website'] ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="email">E-mail:</label>
                    </div>
                    <div class="col-75">
                        <input type="email" class="title-box" name="email" required value="<?php echo $app['email'] ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="cotact">Contact No. :</label>
                    </div>
                    <div class="col-75">
                        <input type="tel" class="title-box" name="contact" pattern="[0-9]{10}" required value="<?php echo $app['contact'] ?>" />
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="center">
            <button class="publish-button">Publish</button>
        </div>
    </form>
<?php
} else {
    echo "<script> alert ('Access denied!'); </script>";
    echo "<script>window.location.href = './itemDetail.php?itemid=$itemid';</script>";
}
?>

<script>
    function setFree() {
        document.getElementById("appprice").disabled = true;
    }

    function setPrice() {
        document.getElementById("appprice").disabled = false;
    }

    // Set values
    var type = document.getElementById('applicationtype')
    var category = document.getElementById('category')
    var language = document.getElementById('language')
    var des = document.getElementById('description')
 
    if (<?php echo $app['price'] ?> == 0) {
        document.getElementById("freeradio").checked = true;
        document.getElementById("appprice").disabled = true;
    } else {
        document.getElementById('paidradio').checked = true;
        document.getElementById("appprice").disabled = false;
    }

    type.value = "<?php echo $app['type'] ?>";
    category.value = "<?php echo $app['category'] ?>";
    language.value = "<?php echo $app['language'] ?>";
    des.value = "<?php echo $app['description'] ?>";
</script>