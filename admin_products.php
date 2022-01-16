<!DOCTYPE html>
<html>



<body>
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

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

$query = "select * from products";

$results = $conn->query($query) ;


echo "<table border=1>";
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
</html>








