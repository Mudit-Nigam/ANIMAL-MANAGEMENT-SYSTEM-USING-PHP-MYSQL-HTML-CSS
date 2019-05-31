<html>
<body>

  <form action="hi.php" method="post">
   name:<br>
   <input type="text" name="name"><br>
   mobile number:<br>
   <input type="text" name="mob">
   <input type="submit" value="Submit">
 </form>
 <?php
$breedname = $_POST['breedname'];

if ( isset( $_POST['submit'] ) ) {

 // retrieve the form data by using the element's name attributes value as key

 echo '<h2>form data retrieved by using the $_REQUEST variable<h2/>'

 $firstname = $_REQUEST['firstname'];
 $lastname = $_REQUEST['lastname'];

 // display the results
 echo 'Your name is ' . $lastname .' ' . $firstname;

 // check if the post method is used to submit the form

 if ( filter_has_var( INPUT_POST, 'submit' ) ) {

 echo '<h2>form data retrieved by using $_POST variable<h2/>'

 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];

 // display the results
 echo 'Your name is ' . $lastname .' ' . $firstname;
 }

 // check if the get method is used to submit the form

 if ( filter_has_var( INPUT_GET, 'submit' ) ) {

 echo '<h2>form data retrieved by using $_GET variable<h2/>'

 $firstname = $_GET['firstname'];
 $lastname = $_GET['lastname'];
 }

 // display the results
 echo 'Your name is ' . $lastname .' ' . $firstname;
 exit;
 }



</body>
</html>
