<html>
<head>
</head>
<style>

</style>
<?php

session_start();

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

// bageb el product mn el bel ID mn eldatbase w ba3melo delete w ba3mel delete lel sora

$sql="delete from orderarray where ProductID ='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);

$sql="delete from product_images where productID ='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);

$sql="delete from products where ProductID ='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);


if(!$result)
{
		die("Unable to execute query");

}
else
{
    echo"<h3 style='color:green;'> Deleted secc </h3> ";
		Header("Location:admin_products.php");
}

?>
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
