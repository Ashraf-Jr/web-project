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
include_once("auditor menu.php");
}
else
{
include_once("menu.php");
}
}
 ?>
<html>
<head>
  <style>
  input[type=submit] {
    width: 30%;
    background-color: #FF5349;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type=submit]:hover {
    background-color: #9F2B00;
  }


        .wrapper {
  padding: 50px;
}

.image--cover {
  width: 200px;
  height: 200px;
  border-radius: 50%;

  object-fit: cover;

}
label{
  font-size:13pt;
  font-family: Calisto MT;
}
.form
{
  margin-left: 500px;
  margin-right: 500px;
}
hr
{
width:30%;
}
a:hover{
  color:white;
}
a
{
  color:#818181;
  text-decoration: none;
}

  </style>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->

        <!-- Logo -->

            <!-- <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; >
            <div class="sidenav">
              <center>
              <a href="HomePage.php">Home</a>
             <a href="AboutUs.php">About Us</a>
             <a href="OurProducts.php">Our Products</a>
             <a href="#">Careers</a>
             <a href="ContactUs.php">Contact Us</a>
             <a href="SignUp.php">SignUp</a>
             <a href="LoginPage.php">Login</a>
           </center>
            </div> -->

    <!-- Image menu in Header to contain an Image and
        a sample text over that image -->

</header>

</head>
<center>
<h1 style="color:#333333"> Profile</h1></center>

<h4 style="text-align:center">Personal Information</h4>
<hr>
<!-- <div style="justify-content:space-around;display:flex">
  <div>
    <p style="text-align:justify">Assertively utilize adaptive customer seruvice for future-proof platforms.
      Completely frive optimal markets.</p>
</div>
<div> -->
  <?php

$fname="";
$lname="";
$email="";
$address="";
$user="";
$phone="";
$conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
  echo"Failed to connect with the DataBase";
}
echo"   <center> <div class='wrapper'><img class='image--cover' src=".$_SESSION['Profile']." alt='Profile Picture' width='100'height-'100'></div></center><br>";

$query="select * from user where UserID=\"".$_SESSION['ID']."\"";
$result=$conn->query($query);
if($row=$result->fetch_array(MYSQLI_ASSOC))
{
  $fname=$row['FirstName'];
  $lname=$row['LastName'];
  $email=$row['Email'];
  $address=$row['Address'];
  $phone=$row['Phone'];
  //$user=$row['UserName'];
}
echo'  <form class="form" action="edit.php" method="post">';
echo'    <div style="justify-content:space-around;display:flex">';
echo'    <div>';
// echo'    Profile Picture<br>';
echo '   <label>First name</label><br>';
echo"    <b><label for='fname'>" .$_SESSION['FirstName']. "</label></b><br>";
echo'    <label>Email</label><br>';
echo"   <b> <label for='email'>".$_SESSION['Email']."</label></b><br>";
echo'    <label>Address</label><br>';
echo"    <b><label for='address'> ".$_SESSION['Address']."</label></b>";

echo'  </div>';
echo'  <div style="margin-left:10px">';
echo'    <label>Last Name</label><br>';
echo"    <b><label for='lname' >".$_SESSION['LastName']."</label></b><br>";
echo "<label>Phone Number</label><br>";
echo"<b><label for='phone'>".$_SESSION['Phone']."</label></b>";
echo'  </div>';
echo'</div>';
echo'<br><center><input  type="submit" name="edit" value="edit"></center>';

echo'  </form>';
echo'</div>';


?>
<br><br>
</div>

<footer style="background-color:#ededed;width:100%;background-color:#263840;color:#818181;">
  <br>
  <div style="justify-content:space-evenly;display:flex">
  <div>
    <b>get to know us</b>
    <ul>
      <li>careers</li>
      <li>blog</li>
      <li>about amazon</li>
    </ul>
  </div>
  <div>
<b>Let us Help You </b>
<ul>
 <a href="Account.php" alt=" your account"><li>your account</li></a>
 <a href="YouOrders.php"><li>you orders</li></a>
 <li>shipping rates & policies</li>
 <li>returns & replacemnts</li>
</ul>
</div>
<div>
 <b>Make Money with Us</b>
 <ul>
   <li>sell products on amazon</li>
   <li>sell apps on amazon</li>
     <li>Advertise Your Products</li>
     </ul>
</div>

</div>
</footer>



</html>
