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

  $innerJoin="SELECT * FROM orderarray ,TotalPrice INNER JOIN orders ON orders.OrderID = orderarray.OrderID inner join Receipt on Receipt.OrderID=orders.OrderID ";
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
         //$per=$priceArray[$x]*$Quantity[$x];
         //echo $priceArray[$x];
           //$n=count($OrderID)-1;
     echo"  <tr>";
     echo"    <td>$OrderID[$x]</td>";
    // echo"    <td>$ProductName[$x]  </td>";
     echo"    <td> X $Quantity[$x] </td>";
     echo"    <td>$Size[$x] </td>";
     echo "<td>$price[$x] </td>";
     //echo"    <td> $per  LE </td>";
     echo"  </tr>";
      }
        ?>



     </tbody>
   </table>
</body>
</html>
