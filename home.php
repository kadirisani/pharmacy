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
  <title>Pharmacy IVY Entry Application</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="scripts/home.js"></script>
</head>
<body>
<div class="container">

    <div class="four columns">
      <h1>Virtua</h1>
    </div>
     
    <div id="nav" class="eight columns">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="search.php">Search IV Logs</a></li>
            <li><a href="newIvEntry.php">New IV Entry</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
        </ul>
    </div>

    <div id="welcome" class="twelve columns">
      <h4><?php echo $_SESSION["fullName"] ?>Save your Ivy Log Entries in digital format!</h4>
      <p>This site helps to save your Ivy log entries in a secured database and helps you to search for any record(s) and verify the Ivy details. Use the navigation bar above to access the features like search, new Ivy log entry.</p>
  </div>

    <div id="headerImage" class="twelve columns">
      <img src="images/Ivy_Log_Page_Template.jpg">
    </div>

</div>
</body>
</html>