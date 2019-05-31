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


$sql = "INSERT INTO ORGANIZATION VALUES ('	A ','	1 ','1'),('	B ','	2 ','2'),('	C ','	3 ','3'),('	D ','	4 ','4'),('	E ','	5 ','5'),('	F ','	6 ','6'),('	G ','	7 ','7'),('	H ','	8 ','8'),('	I ','	9 ','9'),('	J ','	10 ','10'),('	K ','	11 ','11'),('	L ','	12 ','12'),('	M ','	13 ','13'),('	N ','	14 ','14'),('	O ','	15 ','15'),('	P ','	16 ','16'),('	Q ','	17 ','17'),('	R ','	18 ','1'),('	S ','	19 ','19'),('	T ','	20 ','20'),('	U ','	21 ','21'),('	V ','	22 ','22'),('	W ','	23 ','23'),('	X ','	24 ','24'),('	Y ','	25 ','25'),('	Z ','	26 ','26')";


if ($conn->query($sql) === TRUE){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
