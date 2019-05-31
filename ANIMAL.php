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


$sql = "INSERT INTO ANIMAL VALUES ('DOG'),('CAT'),('COW'),('RAT'),('TORTOISE'),('RABBIT')";


if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
