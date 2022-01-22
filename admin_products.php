
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
<!DOCTYPE html>
<html>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}


#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #9F2B00;
  color: white;
}
a{
  text-decoration:none;
  color:black;

}
</style>


<body>
<?php

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

$query = "select * from products";

$results = $conn->query($query) ;


echo "<table class='form' border=1 id='customers'>";
echo "
 <tr>
<th> ProductID </th>
<th>ProductName</th>
<th>Category</th>
<th>Price</th>
<th>Amount</th>
<th>Description</th>
<th>Fabric</th>
<th>AverageRate</th>
<th>Stock</th>
<th><a href=AddProduct.php>Add</a></th>
 </tr>";
while ($row = $results->fetch_array(MYSQLI_ASSOC) ) {

?>
<tr>
<td><?php echo $row['ProductID'] ?> </td>
<td><?php echo $row['ProductName'] ?> </td>
<td><?php echo $row['Category'] ?> </td>
<td><?php echo $row['Price'] ?> </td>
<td><?php echo $row['Amount'] ?> </td>
<td><?php echo $row['Description'] ?> </td>
<td><?php echo $row['Fabric'] ?> </td>
<td><?php echo $row['AverageRate'] ?> </td>
<td><?php echo $row['Stock'] ?> </td>
<td><a href=EditProduct.php?id=<?php echo $row['ProductID'] ?> >Edit</a> </td>
<td><a href=DeleteProduct.php?id=<?php echo $row['ProductID'] ?> >Delete</a> </td>

</tr>

<?php
}
?>
</table>
</body>
<footer style="background-color:#ededed;width:100%;background-color:#263840;color:#818181;position:absolute;bottom:0px">
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
