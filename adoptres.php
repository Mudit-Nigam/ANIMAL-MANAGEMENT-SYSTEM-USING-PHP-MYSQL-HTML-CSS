<?php
session_start();
?>
<html>
<head><title>Availability</title>
  <link type="text/css" rel="stylesheet" href="table.css">

</head>

<body background="ADOPTRES.jpg" text="black" font size="6">
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

if(isset($_POST['submt']))
{
$animal = $_SESSION['animal'];
$breedname = $_POST['breedname'];
$mob = $_POST['mob'];
$name = $_POST['name'];

$sql = "INSERT INTO selected VALUES ('".$animal."','". $breedname. "'," . $mob . ",'" . $name . "');";


$conn->query($sql);
}

$sql1 = "SELECT * FROM ORG_HAS_ANIMAL A,ORGANIZATION B WHERE A.Organization_ID = B.Organization_ID and A.Breed_Name = '" . $breedname ."';";
$result = $conn->query($sql1);

echo "<font size=5>";
echo "PLEASE CONTACT THE FOLLOWING ORGANIZATIONS:->";
echo "</font>";

echo "<table>";
echo "<tr><th>Breed_Name</th>"." "." <th>Total_Strength</th>"." "." <th>Organization_Name</th>"." "." <th>Organization_Phone</th></tr>";
while($row = $result->fetch_assoc())
{
  echo "<tr><td>";
  echo $row['Breed_Name'] ."</td>". " " ."<td>". $row['Total_Strength'] ."</td>". " " ."<td>". $row['Organization_Name'] ."</td>". " " . "<td>".$row['Organization_Phone'] ."</td>". "<br>"  ;
  echo "</td></tr>";
}
echo "</table>";


$conn->close();
?>
<!--<div class="center1">
<a href="page1.html"><img id = "a" src="ADOPT.png" style="width:96%; height:20%" title="adopt" alt="adopt"></a>
</div>-->
</body>
</html>
