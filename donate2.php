<?php
// Start the session
session_start();
?>
<html>
<head><title>Availability</title>
  <link type="text/css" rel="stylesheet" href="donate2.css">

</head>

<body background="DONATE2.jpg"  text="black" font size="6">

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

$mob = $_POST['mob'];
$animal = $_POST['animal'];
$breedname = $_POST['breedname'];
$total = $_POST['total'];
$name = $_POST['Name'];

$sql1 = "call P('".$mob."','" . $name . "')";
$sql = "INSERT INTO DONATES VALUES ('".$mob."','" . $breedname . "'," . $total . ")";
}

if ($conn->query($sql1) === TRUE){
    echo "Inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if(!$conn->query($sql))
{

	echo $conn->errno.' '.$conn->error;

}



echo "<h3> Your Response has been taken</h3>";
$conn->close();
?>
<!--<div class="center1">
<a href="page1.html"><img id = "a" src="ADOPT.png" style="width:96%; height:20%" title="adopt" alt="adopt"></a>
</div>-->
</body>
</html>
