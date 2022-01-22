<?php
$connect = mysqli_connect("localhost", "root", "", "market place");
$output = '';
if(isset($_POST["query"]))
// search 3la eldata from el data base w like 3shan lama el2i 7aga shabha etl3 kolo msh lazem tekon maktoba bzbt
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
 SELECT orderarray.*,products.ProductName,products.Price,orders.UserID
	  FROM products,orderarray,orders
	   WHERE orderarray.ProductID=products.ProductID AND orderarray.OrderID=orders.OrderID
	    AND (
		        orders.UserID LIKE '%".$search."%'
	            OR orders.OrderID LIKE '%".$search."%'
	        	 OR products.ProductID LIKE '%".$search."%'
				OR products.ProductName LIKE '%".$search."%'
				OR products.Price LIKE  '%".$search."%'
				OR orderarray.Size LIKE '%".$search."%'
				 OR orderarray.Quantity LIKE '%".$search."%' )

 ";
}// lw msh kateb 7aga feh el search display kolo
else
{

 $query = "SELECT orderarray.*,products.ProductName,products.Price,orders.UserID FROM products,orderarray,orders WHERE orderarray.ProductID=products.ProductID AND orderarray.OrderID=orders.OrderID ORDER BY OrderID ";
}
$result = mysqli_query($connect, $query);
if($result)
{

 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>UserID</th>
     <th>OrderID</th>
     <th>ProductID</th>
     <th>ProductName</th>
     <th>Price</th>
     <th>Size</th>
     <th>Quantity</th>
    </tr>
 ';
 echo $output;
// row daha 3shan el tables msh aktar

while ($row = $result->fetch_array(MYSQLI_ASSOC) )  {
   ?>
  <tr>
<td><?php echo $row['UserID'] ?> </td>
<td><?php echo $row['OrderID'] ?> </td>
<td><?php echo $row['ProductID'] ?> </td>
<td><?php echo $row['ProductName'] ?> </td>
<td><?php echo $row['Price'] ?> </td>
<td><?php echo $row['Size'] ?> </td>
<td><?php echo $row['Quantity'] ?> </td>

</tr>
<?php

 }
}
else
{
 echo 'Data Not Found';
}

?>
</table>

<footer style="background-color:#ededed;width:100%;background-color:#263840;color:#818181;position:absolute;">
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
