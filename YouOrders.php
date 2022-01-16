<?php session_start(); ?>
<html>
<head>

  <style>
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
select {
  width: 20%;
  padding: 7px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #ededed;
  border: none;
  color: black;
  padding: 2px 12px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
input[type=text]
{
transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
width: 20%;
}
.checked {
  color: orange;
}
input[type=submit].star
{
  width:3px;

  background-color: transparent;
color:transparent;


}
button.star
{
  background-color: transparent;
}
body
{
  margin-left:65px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
</style>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->

        <!-- Logo -->

          <a href="HomePage.php" > <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; ></a>
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
<body>
  <h1>Your History of Orders</h1>

  <?php
  $counter=0;
  $OrderID=array();
  $ProductName=array();
  $Quantity=array();
  $Size=array();
  $price=array();
  $x=0;
  $conn=mysqli_connect("localhost","root","","market place");
  if(!$conn)
  {
    echo"can not connect with the Database";
  }
// elmoshkela hena mesh amleen join l table el products el hya gay menha el price aslan
  $innerJoin="SELECT * FROM orderarray INNER JOIN orders ON orders.OrderID = orderarray.OrderID inner join Receipt on Receipt.OrderID=orders.OrderID ";
  $result=$conn->query($innerJoin);
  if($result)
  {
    while($row=$result->fetch_array(MYSQLI_ASSOC))
    {
      $OrderID[$x]=$row['OrderID'];
      //$ProductName[$x]=$row['ProductName'];
      $Quantity[$x]=$row['Quantity'];
      $Size[$x]=$row['Size'];
      $price[$x]=$row['Price'];
    }
    $counter++;
    $x++;
  }

   ?>
   <table class="table">
     <thead>
       <tr>
         <th>OrderID</th>
         <th>ProductName</th>
         <th>Quantity</th>
         <th>Size</th>
         <th>Price </th>


       </tr>
     </thead>
     <tbody>
       <?php

       for($x=0;$x<$counter;$x++)
       {
        if($OrderID[$x]==0 &&$Quantity[$x]==0 &&$Size[$x]==0 &&$price[$x]==0)
        {
          echo "You Made no Orders to be displayed!";
          break;
        }
        else
        {
     echo"  <tr>";
     echo"    <td>$OrderID[$x]</td>";
     echo"    <td> X $Quantity[$x] </td>";
     echo"    <td>$Size[$x] </td>";
     echo  "<td>$price[$x] </td>";
     echo"  </tr>";
   }
      }
        ?>



     </tbody>
   </table>
</body>
</html>
