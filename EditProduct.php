<html>
<head>
	<style>
	input[type=submit]
	{
	  width: 40%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;

	}
	input[type=text]
	{
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}
	.form
	{
	  margin-left:300px;
	  margin-right:300px;
	}
	label
	{
		font-weight:bold;
	}
	</style>
</head>
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
include_once("auditor menu.php");
}
else
{
include_once("menu.php");
}
}
 ?>
<?php

echo"<br><br>";


$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

if(!isset($_GET['submit'])){
	$ProductID=$_GET['id'];

$select="select * from Products where ProductID=".$_GET['id'];
$result1=$conn->query($select);
if($row = $result1->fetch_array(MYSQLI_ASSOC))
{
	echo "<form class='form' action='' method='get'>";
 // echo "Product ID: <input type= 'hidden'  name= 'ProductID'  value='".$row['ProductID']."'><br>";
echo "<label>Product</label> Name: <input type= 'text'  name= 'ProductName' value=".$row['ProductName']."><br>";
echo "<label>Category:</label> <input type= 'text'  name= 'Category' value=".$row['Category']."><br>";
echo "<label>Price:</label> <input type= 'text'  name= 'Price' value=".$row['Price']."><br>";
echo "<label>Amount:</label> <input type= 'text'  name= 'Amount' value=".$row['Amount']."><br>";
echo "<label>Description:</label> <input type= 'text'  name= 'Description' value=".$row['Description']."><br>";
echo "<label>Fabric:</label> <input type= 'text'  name= 'Fabric' value=".$row['Fabric']."><br>";
echo "<label>Average Rate:</label> <input type= 'text'  name= 'AverageRate' value=".$row['AverageRate']."><br>";
echo "<label>Stock:</label> <input type= 'text'  name= 'Stock' value=".$row['Stock']."><br>";
echo "<center><input  type= 'submit'  name= 'submit'  value= 'Submit' ></center><br>";
echo"</form>";

}

}

if(isset($_GET['submit'])){
$sql="update products set ProductID='".$_GET['ProductID']."', ProductName='".$_GET['ProductName']."', Category='".$_GET['Category']."', Price='".$_GET['Price']."', Amount='".$_GET['Amount']."', Description='".$_GET['Description']."', Fabric='".$_GET['Fabric']."', AverageRate='".$_GET['AverageRate']."', Stock='".$_GET['Stock']."'  where ProductID = '".$_GET['ProductID']."'";

$result=mysqli_query($conn,$sql);
if(!$result){

	die("Unable to execute query");
}
else{
echo"<h3 style='color:green;'> Updated </h3> ";
}

}

?>
</body>

<footer class="footer" style="background-color:#263840;color:#818181">
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
