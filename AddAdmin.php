<?php
session_start();

if(isset($_SESSION['ID']))
{
  if($_SESSION['Role']==1)
  {
    include_once("client menu.php");
  }
  else if($_SESSION['Role']==2)
  {
    include_once("admin menu.php");
  }
  else if($_SESSION['Role']==3)
  {
    include_once("HRmenu.php");
  }
  else if($_SESSION['Role']==4)
  {
    include_once("auditormenu.php");
  }
  
}
else
{
    include_once("menu.php");  
}

echo "<br>";
$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

echo "<form action='AddAdmin.php' method='post'>";
echo "First Name:<br> <input type= 'text'  name= 'FirstName' ><br>";
echo "Last Name:<br> <input type= 'text'  name= 'LastName' ><br>";
echo "Address:<br> <input type= 'text'  name= 'Address' ><br>";
echo "DateOfBirth:<br> <input type= 'date'  name= 'DateOfBirth' ><br>";
echo "Email:<br> <input type= 'text'  name= 'Email' ><br>";
echo "Password:<br> <input type= 'password'  name= 'Password' ><br>";

echo "Phone:<br> <input type= 'text'  name= 'Phone' ><br>";
echo "Gender:<br>";
echo "male <input type= 'radio'  name= 'Gender' value='male' > ";
echo "female <input type= 'radio'  name= 'Gender'  value='female' ><br><br>";
echo "<input type= 'submit'  name= 'submit'  value= 'Submit' >";
echo"</form>";


if(isset($_POST['submit'])){



$sql = "INSERT INTO user ( FirstName, LastName ,Address,Password,Gender, DateOfBirth , RoleType , Email,Phone)
VALUES ('".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Address']."','".$_POST['Password']."','".$_POST['Gender']."','".$_POST['DateOfBirth']."','2','".$_POST['Email']."','".$_POST['Phone']."')";
$result=$conn->query($sql);


  if(!$result){

	die("Unable to execute query");
  }
  else{


    echo"<h3 style='color:green;'> Added Admin secc </h3> ";
  }
}


$conn->close();
?>
