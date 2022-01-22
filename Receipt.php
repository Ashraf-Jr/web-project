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
  /* margin-left:65px; */
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
</style>
</head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<header>



</header>
<body>
<?php
$conn=mysqli_connect("localhost","root","","market place");

$insertOrder="INSERT INTO orders (UserID) VALUES (".$_SESSION['ID'].")";
$resultOrder=$conn->query($insertOrder);


if(isset($_GET['checkout']))
{
//$OrderID=1;
$retriveCart="select * from cart where UserID=".$_SESSION['ID'];///want to get everything out from the cart
$cartResult=$conn->query($retriveCart);//my run

//$CartID=array();
//$current=0;
$UserID;
$ProductID;
$Quantity=array();


$q=0;
$Size=array();
$OrderID=array();
$order=0;

$productArray=array();
$array=0;



$retriveOrderID="select OrderID from orders where UserID=".$_SESSION['ID'];
$resultOrderID=$conn->query($retriveOrderID);
if($resultOrderID)
{
  while($row=$resultOrderID->fetch_array(MYSQLI_ASSOC))
  {
    $OrderID[$order]=$row['OrderID'];
    $order++;
  }
}
else
 {
  echo"something went wrong";
}

//
// for($x=0;$x<count($OrderID);$x++)
// {
//   echo $OrderID[$x]."<br>";
// }
$lasst=count($OrderID)-1;


if($cartResult)///cartResult
{
  while($row=$cartResult->fetch_array(MYSQLI_ASSOC))
  {
  //  $CartID[$current]=$row['CartID'];
  $productArray[$array]=$row['ProductID'];
    $UserID=$row['UserID'];
    $ProductID=$row['ProductID'];
    $Quantity[$q]=$row['Quantity'];
    $Size[$q]= $row['Size'];
    $insertOrderArray="INSERT INTO orderarray (OrderID, ProductID  , Quantity , Size   ) VALUES ( $OrderID[$lasst]  ,$ProductID  , $Quantity[$q] ,\"$Size[$q]\")";
  //  echo $insertOrderArray."<br>";
  $orderArrayResult=$conn->query($insertOrderArray);
//  $current++;

  if($orderArrayResult)
  {
    // echo"succes";
  }
  else
  {
    echo"something went wrong";
  }

$q++;
$array++;
//$order++;

   }
//   echo "<br>".$array."<br>";

   }
 $DateOfOrder =  date('Y/m/d');
 $ShippingDate=date('Y-m-d', strtotime($DateOfOrder. ' + 5 days'));
 $priceArray=array();
  $TotalPrice=0;
//
 $ProductNameArray=array();
 //  echo  "<br> count of product Array:".count($productArray)."<br>";
 // for($x=0;$x<count($productArray);$x++)
 // {
 //   echo "<br>here ".$productArray[1]."<br";
 // }




for($x=0;$x<count($productArray);$x++)////product array is only r
{
  //echo "<br>".$productArray[$x]."<br>";
  $PriceFromProduct="select Price ,ProductName from products where ProductID=$productArray[$x]"; //// i want from table products pid ,pname ,pPrice
  $resultProduct=$conn->query($PriceFromProduct);
  while($row=$resultProduct->fetch_array(MYSQLI_ASSOC))
  {
  //  echo $row['Price']."<br>";
    //echo $Quantity[$x]."<br><br>";
   $TotalPrice+=$row['Price']*$Quantity[$x];
   $priceArray[$x]=$row['Price'];
   $ProductNameArray[$x]=$row['ProductName'];

  }
}

//echo "<br>product array ".count($productArray)."<br>";

//echo $TotalPrice;
$last=count($OrderID)-1;
$Receipt="INSERT INTO receipt (OrderID,DateOfOrder,ShippingDate,TotalPrice) VALUES ($OrderID[$last],\"$DateOfOrder\",\"$ShippingDate\",$TotalPrice)";
//echo $Receipt;
$receiptResult=$conn->query($Receipt);
if($receiptResult)
{
  // echo"receipt done";
}
else
{
  echo"something went wrong";
}


//echo $Size;
//echo $Quantity;

$Receipt_Order="SELECT * FROM orderarray INNER JOIN Receipt ON orderarray.OrderID = Receipt.OrderID inner join orders on orders.OrderID=Receipt.OrderID  ";
//echo $Receipt_Order;
$resultBoth=$conn->query($Receipt_Order);
if($resultBoth)
{
?>

<div class="container">
  <br>
  <h2>Receipt</h2>
  <p>We’re thankful that you chose us to [insert service] when we’re fully aware there are many other companies to choose from. As a first-time customer of our family-owned business, we wanted to officially welcome you to our family. Cheers, [sign off with the family members’ names].</p>
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
      for($x=0;$x<count($Quantity);$x++)
      {
        $per=$priceArray[$x]*$Quantity[$x];
        echo $priceArray[$x];
$n=count($OrderID)-1;
    echo"  <tr>";
    echo"    <td>$OrderID[$n]</td>";
    echo"    <td>$ProductNameArray[$x]  </td>";
    echo"    <td> X $Quantity[$x] </td>";
    echo"    <td>$Size[$x] </td>";
    echo"    <td> $per  LE </td>";
    echo"  </tr>";
     }
       ?>



    </tbody>
  </table>
</div>

<?php
echo "<p style='margin-left:20px;border:5px'>Date of Order: ".$DateOfOrder ."</h4></p><br>";
echo "<p style='margin-left:20px;border:5px'>ShippingDate: ".$ShippingDate."</h4></p><br>";
echo "<h4 style='margin-left:20px'>Total Price: ".$TotalPrice." LE</h4>";

}
//$OrderID++;

 $deleteCart="Delete  from cart where UserID=".$_SESSION['ID'];
 $deleteCartResult=$conn->query($deleteCart);
 if($deleteCartResult)
{
  //header( "Location: Products.php" );
  //OurProducts.php

}
 else
 {
   echo "Sorry something went wrong";
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
