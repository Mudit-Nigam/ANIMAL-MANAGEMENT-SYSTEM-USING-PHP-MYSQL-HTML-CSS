<?php

     session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Report a stray animal...</title>
  <link type="text/css" rel="stylesheet" href="report.css">
</head>
<body>
<?php if(isset($_POST["Pincode"])): ?>
  <div class="bgimg4"   >
      <h2>Congratulations You Are a Wonderful Citizen</h2>
      <!--<a href="page1.html"><img id = "a" src="ADOPT.png" style="width:50%; height:10%" title="adopt" alt="adopt"></a>-->
  </div>
    <?php

        $_SESSION["Pincode"] = $_POST["Pincode"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "animals";
        $breed = "";
        $landmark="";
        $conn = new mysqli($servername,$username,$password,$dbname);

        if ($conn->connect_error){

           die("Connection Failed".$conn->connect_error);
        }

        if(!isset($_SESSION["Breed"]))

        {
            $breed = "UNKNOWN"."_".$_SESSION["Animal"];

        }
        else
        {
            $breed = $_SESSION["Breed"];
        }

        if(!isset($_POST["Landmark"]))
        {
            $landmark = "No Landmark";
        }

        else
        {
            $landmark = $_POST["Landmark"];
        }

        if(!$stmt1 = $conn->prepare("call P(?,?)"))
        {
            $error = $conn->errno. ' '. $conn->error;
            echo $error;
        }

        else
        {
            $stmt1->bind_param("ss",$_SESSION["Mobile_Number"],$_SESSION["Name"]);
            $res = $stmt1->execute();

            if(!$res)
            {
                $error = $conn->errno.' '.$conn->error;
                echo "Sorry";
                echo $error;
            }
        }

        if(!$stmt = $conn->prepare("insert into REPORT(Citizen_ID,Breed_Name,Area_Name,Pin_Code,Landmark) values(?,?,?,?,?)"))
        {
            $error = $conn->errno.' '.$conn->error;
            echo "$error";
            echo "Sorry";
        }
        else
        {
            $stmt->bind_param("sssss",$_SESSION["Mobile_Number"],$breed,$_POST["Area_Name"],$_POST["Pincode"],$landmark);

            $res = $stmt->execute();

            if(!$res)
            {
                $error = $conn->errno.' '.$conn->error;
                echo "$error";
                echo "Sorry";
            }
        }
        $stmt->close();
        $conn->close();
    ?>


<?php elseif(isset($_POST["Animal"])): ?>

      <?php
            $_SESSION["Animal"] = $_POST["Animal"];
            if(isset($_POST["Breed"])){

                $_SESSION["Breed"] = $_POST["Breed"];
                }
      ?>

      <div class ="bgimg3">
            <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
              Area_Name: <input type = "text" name="Area_Name"><br>
              PinCode: <input type ="text" name ="Pincode"><br><br>
              Landmark: <input type="text" name="Landmark" placeholder="Optional">
              <br>
              <input type="submit">
          </form>
      </div>
<?php elseif (isset($_POST["Mobile_Number"])): ?>

      <?php
            $_SESSION["Mobile_Number"] = $_POST["Mobile_Number"];
            $_SESSION["Name"] = $_POST["Name"];
      ?>

      <div class = "bgimg2">
          <form action =<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method = "post">
              Animal_Spotted : <input type = "text" name = "Animal">
              <br><br>
              <b>Do you know the Breed too? :</b> <input type ="text" name="Breed" placeholder="unknown">
              <br><br>
              <input type ="submit">
          </form>
      </div>

<?php else: ?>
      <div class="bgimg1" >
          <form action =<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?> method = "post">
              Citizens Name :   <input type = "text" name ="Name"><br>
              Mobile Number : <input type = "text" name = "Mobile_Number"><br><br>
              <input type = "submit">
          </form>
      </div>
<?php endif; ?>
</body>
</html>
