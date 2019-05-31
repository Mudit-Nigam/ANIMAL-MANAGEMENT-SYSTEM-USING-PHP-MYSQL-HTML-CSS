<?php
// Start the session
session_start();
?>
<html>
<head><title>Availability</title>
  <link type="text/css" rel="stylesheet" href="donate1.css">

</head>

<body background="DONATE1.jpg" text="black" font size="6">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "animals";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

?>
<form action="donate2.php" method="post" font-size= 80px>
   <font size= 15px color="black">Your Name:</font><br>
   <input type="text" name="Name"><br>
  <font size= 15px color="black">Your mobile number:</font><br>
   <input type="text" name="mob"><br>
  <font size=15px color="black">Your animal category:</font><br>
   <input type="text" name="animal"><br>
  <font size=15px color="black">Your animal breed:</font><br>
   <input type="text" name="breedname"><br>
  <font size=15px color="black">Total number of animals to donate in this breed:</font><br>
   <input type="text" name="total">
   <input type="submit" name= "submt" value="Submit">
</form>
<?php
$conn->close();
?>
</body>
</html>
