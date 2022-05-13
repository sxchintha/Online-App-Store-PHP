    <?php
session_start();
include './components/header.php';
?>

<style>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/store/online-app-store-php/css/adListing.css';
    ?>
</style>
    
    <h1 class="add-listing-heading">Store Listing</h1><br/>
    <form class="listing-form">
      <div class="form-content">
          <br/>
        <h3>Categorization</h3>
<br/>
        <div class="border">
          <div class="row">
            <div class="col-25">
              <label for="fname">Application Type:</label>
            </div>
            <div class="col-75">
              <select name="cars" id="cars">
                <option value="volvo">APK</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Category:</label>
            </div>
            <div class="col-75">
              <select name="cars" id="cars">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Content Rating</label>
            </div>
            <div class="col-75">
              <select name="cars" id="cars">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
        </div><br/>

        <h3>Upload Application</h3><br/>
        <div class="border">
          <div class="upApk">
            <label>Title</label><br />
            <input type="text" class="title-box" /><br /><br />
            <label for="lname">Description</label><br />
            <textarea class="description-box"></textarea><br /><br />
            <label>Default Language</label><br />
            <select name="cars" id="cars">
              <option value="volvo">Volvo</option>
              <option value="saab">Saab</option>
              <option value="opel">Opel</option>
              <option value="audi">Audi</option></select
            ><br /><br />
            <label>Upload APK</label><br />
            <input type="file" id="myFile" name="filename" /><br />
          </div>
        </div><br/>

        <h3>Contact Details</h3>
        <br/>
        <div class="border">
          <div class="row">
            <div class="col-25">
              <label for="fname">Application Type:</label>
            </div>
            <div class="col-75">
              <select name="cars" id="cars">
                <option value="volvo">APK</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Category:</label>
            </div>
            <div class="col-75">
              <select name="cars" id="cars">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="fname">Content Rating</label>
            </div>
            <div class="col-75">
              <select name="cars" id="cars">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <br />
      <div class="center">
        <button class="publish-button">Publish</button>
      </div>
    </form>