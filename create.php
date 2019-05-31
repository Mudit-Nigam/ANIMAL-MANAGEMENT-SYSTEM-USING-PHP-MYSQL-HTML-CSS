<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE animals";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$dbname = "animals";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

$sql1 = "CREATE TABLE selected (
name varchar(30)  ,
breedname VARCHAR(30) ,
citno int ,
citname VARCHAR(30),
PRIMARY KEY(citno,citname)
)";



$sql2 = "create table ORGANIZATION(Organization_Name varchar(20) not null,Organization_ID int,Organization_Phone varchar(20) not null,primary key(Organization_ID))";
$sql3 = "create table ANIMAL(Animal_Name varchar(20),primary key(Animal_Name))";
$sql6 = "create table AREA(Area_Name varchar(50),Pin_Code varchar(20),primary key(Area_Name,Pin_Code))";
$sql4 = "create table BREED(Animal_Name varchar(50),Breed_Name varchar(20),foreign key(Animal_Name) references ANIMAL(Animal_Name),primary key(Breed_Name))";

$sql5 = "create table ORG_HAS_ANIMAL(Organization_ID int,Breed_Name varchar(20),Total_Strength int,primary key(Organization_ID,Breed_Name),foreign key(Organization_ID) references ORGANIZATION(Organization_ID) on delete cascade,foreign key(Breed_Name) references BREED(Breed_Name) on delete cascade)";
$sql7 = "create table CITIZEN(Citizen_Name varchar(20),Citizen_ID varchar(20),Number_Of_Contributions int,primary key(Citizen_ID))";
$sql8 = "create table DONATES(Citizen_ID varchar(20),Breed_Name varchar(20),Total_Number int,primary key(Citizen_ID,Breed_Name),foreign key(Citizen_ID) references CITIZEN(Citizen_ID) on delete cascade,foreign key(Breed_Name) references BREED(Breed_Name) on delete cascade);";
$sql9 = "create table REPORT(Citizen_ID varchar(20),Breed_Name varchar(20),Area_Name varchar(50),Pin_Code varchar(20),LandMark varchar(50),primary key(Citizen_ID,Breed_Name,Area_Name,Pin_Code),foreign key(Citizen_ID) references CITIZEN(Citizen_ID) on delete cascade,foreign key(Breed_Name) references BREED(Breed_Name) on delete cascade,foreign key(Area_Name,Pin_Code) references AREA(Area_Name,Pin_Code) on delete cascade);";
//$sql10 = "delimiter |";
//$sql11 = "create procedure P(in CitizenID varchar(20),in CitizenName varchar(20)) begin case when not exists(select * from CITIZEN where Citizen_ID=CitizenID) then insert into CITIZEN values(CitizenName,CitizenID,0); else begin end; end case; end;| ";
//$sql12 = "delimiter //";
//$sql13 =  "create trigger trigger1 before insert on REPORT for each row begin update CITIZEN set Number_Of_Contributions=Number_Of_Contributions+1 where Citizen_ID=new.Citizen_ID; end;//";

$sql14 = "delimiter ;";
if (($conn1->query($sql1) === TRUE)&($conn1->query($sql2) === TRUE)&($conn1->query($sql3) === TRUE)) {
    echo "Table selected created successfully";
} else {
    echo "Error creating table: " . $conn1->error;
}

if (($conn1->query($sql4) === TRUE)&($conn1->query($sql5) === TRUE)) {
    echo "Table selected created successfully";
} else {
    echo "Error creating table: " . $conn1->error;
}
if(($conn1->query($sql6) === TRUE)&($conn1->query($sql7) === TRUE)) {
    echo "Table selected created successfully";
} else {
    echo "Error creating table: " . $conn1->error;
}


if (($conn1->query($sql8) === TRUE)&($conn1->query($sql9) === TRUE)) {
    echo "Table selected created successfully";
} else {
    echo "Error creating table: " . $conn1->error;
}
//if (($conn1->query($sql10) === TRUE)&($conn1->query($sql11) === TRUE)) {
/*    echo "Done procedure";
} else {
    echo "Not done procdeure" . $conn1->error;
}
if(($conn1->query($sql12) === TRUE)&($conn1->query($sql13) === TRUE)) {
    echo "DONE";
} else {
    echo "NOT DONE " . $conn1->error;
}
if(($conn1->query($sql14) === TRUE)) {
    echo "abc";
} else {
  //  echo "not abc" . $conn1->error;
//}*/
$conn1->close();



include 'ANIMAL.php';
include 'AREA.php';
include 'BREED.php';
include 'ORGANIZATION.php';




?>
