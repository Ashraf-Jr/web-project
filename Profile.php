<?php session_start(); ?>
<html>
<head>
  <style>
  .bg {
          background-image: url("https://images.unsplash.com/photo-1523381294911-8d3cead13475?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9");
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }

          .sidenav {
          height: 35px; /* Full-height: remove this if you want "auto" height */
          width: 100%; /* Set the width of the sidebar */
          z-index: 1; /* Stay on top */
          top: 30; /* Stay at the top */
          left: 0;
          background-color: #111; /* Black */
          overflow-x: hidden; /* Disable horizontal scroll */
          padding-top: 20px;
        }

        /* The navigation menu links */
        .sidenav a {
          padding: 6px 8px 6px 16px;
          text-decoration: none;
          font-size: 15px;
          color: #818181;
          display: inline;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
          color: #f1f1f1;
        }

        /* Style page content */
        .main {
          margin-left: 160px; /* Same as the width of the sidebar */
          padding: 0px 10px;
        }
        li
        {


        }
  </style>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->

        <!-- Logo -->

            <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; >
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
            </div>

    <!-- Image menu in Header to contain an Image and
        a sample text over that image -->

</header>

</head>
<center>
<h1>Your Profile</h1></center>

<h4 style="text-align:center">Personal Information</h4>
<hr>
<div style="justify-content:space-around;display:flex">
  <div>
    <p style="text-align:justify">Assertively utilize adaptive customer seruvice for future-proof platforms.
      Completely frive optimal markets.</p>
</div>
<div>
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
echo'  <form action="edit.php" method="post">';
echo'    <div style="justify-content:space-around;display:flex">';
echo'    <div>';
echo'    Profile Picture<br>';
echo"    <img src='".$_SESSION['Profile']."' alt='Profile Picture' width='100'height-'100'><br>";
echo $_SESSION['Profile'];
echo '   First name<br>';
echo"    <label for='fname'>" .$_SESSION['FirstName']. "</label><br>";
echo'    Email<br>';
echo"    <label for='email'>".$_SESSION['Email']."</label><br>";
echo'    Address<br>';
echo"    <label for='address'> ".$_SESSION['Address']."</label>";
echo'<br><input type="submit" name="edit" value="edit">';

echo'  </div>';
echo'  <div style="margin-left:10px">';
echo'    Last Name<br>';
echo"    <label for='lname' >".$_SESSION['LastName']."</label><br>";
echo "Phone Number<br>";
echo"<label for='phone'>".$_SESSION['Phone']."</label>";
echo'  </div>';
echo'</div>';
echo'  </form>';
echo'</div>';

?>
</div>
<footer style="background-color:#ededed;position:absolute;bottom:0px;width:100%">
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
