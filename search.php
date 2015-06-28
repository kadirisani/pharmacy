<?php
session_start();
if (!isset($_SESSION['userid']))
{
    header("Location: login.html");
    die();
}
?>
<!doctype html>
<html>
<head>
  <title>Pharmacy IV Entry Application</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="scripts/search.js"></script>
</head>
<body>
  
  <div class="container">

    <div class="four columns">
      <h1>Virtua</h1>
    </div>
     
    <div id="nav" class="eight columns">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="search.html">Search Iv Logs</a></li>
            <li><a href="newIvEntry.php">New Iv Entry</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
        </ul>
    </div>

    <div id="welcome" class="twelve columns">
      <h4>Make a new Ivy Log Entry!</h4>
  </div>

    <!-- The above form looks like this -->
  <form id="ivForm">
    
    <table class="u-full-width">
      <div id="message"></div>
    <thead>
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Patient Name</th>
        <th>Room</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input class="u-full-width" id="ivDate" name="ivDate" type="date"></td>
        <td><input class="u-full-width" id="ivTime" name="ivTime" type="time"></td>
        <td><input class="u-full-width" id="ptName" name="ptName" type="text"></td>
        <td><input class="u-full-width" id="ptRoom" name="ptRoom" type="text"></td>
      </tr>
    </tbody>
    </table>
    <table class="u-full-width">
    <thead>
      <tr>
        <th>IV Mixture</th>
        <th>Mfr</th>
        <th>Lot#</th>
        <th>Exp</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       <td><input class="u-full-width" id="ivMix" name="ivMix" type="text"></td>
        <td><input class="u-full-width" id="drugMfr" name="drugMfr" type="text"></td>
        <td><input class="u-full-width" id="drugLot" name="drugLot" type="text"></td>
        <td><input class="u-full-width" id="drugExp" name="drugExp" type="date"></td>

      </tr>
    </tbody>
    </table>
    <table class="u-full-width">
    <thead>
      <tr>
        <th>Diluent</th>
        <th>Mfr</th>
        <th>Lot#</th>
        <th>Exp</th>
        <th>Qty</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       <td><input class="u-full-width" id="diluent" name="diluent" type="text"></td>
        <td><input class="u-full-width" id="dilMfr" name="dilMfr" type="text"></td>
        <td><input class="u-full-width" id="dilLot" name="dilLot" type="text"></td>
        <td><input class="u-full-width" id="dilExp" name="dilExp" type="date"></td> 
        <td><input class="u-full-width" id="qty" name="qty" min="1" max="15" type="number" ></td>
      </tr>
    </tbody>
    </table>
    <table class="u-full-width">
    <thead>
      <tr>
        <th>By</th>
      </tr>
    </thead>
    <tbody>
      <tr>
         <td><input class="u-full-width" id="prepBy" name="prepBy" type="text"></td>
      </tr>
    </tbody>
    </table>
    <input class="button-primary" type="submit" value="Submit">
  </form>
  <div id="searchResults"></div>
</div>
</body>
</html>