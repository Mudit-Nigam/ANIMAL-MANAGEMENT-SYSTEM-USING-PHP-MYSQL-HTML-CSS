<?php
// Start the session
session_start();
?>
<html>
<head>
  <title>
    Choose your dog breedname</title>
  <link type="text/css" rel="stylesheet" href="breed.css">
</head>
<body background="DOGCOL.jpg">
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

$sql = "SELECT * FROM BREED where Animal_Name = 'DOG' ";
$result = $conn->query($sql);

echo "<table>";
echo "<tr><th>SELECT YOUR DOG BREED</th></tr>";
while($row = $result->fetch_assoc())
{
  echo "<tr>";
  echo "<td>" . $row['Breed_Name'] . "</td>";
  echo "</tr>";
}
echo "</table>";

$conn->close();
?>


<?php
// Set session variables
$_SESSION["animal"] = "Dog";
?>
<form action="adoptres.php" method="post" font-size= 80px>
  <font size= 15px color="black">Breed name:</font><br>
   <input type="text" name="breedname"><br>
  <font size=15px color="black">Your name:</font><br>
   <input type="text" name="name"><br>
  <font size=15px color="black">Your mobile number:</font><br>
   <input type="text" name="mob">
   <input type="submit" name= "submt" value="Submit">
</form>
</body>
</html>
