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

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
</style>
</head>
<header>



</header>
  <h1>My cart</h1>
<br>
<?php
$conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
  echo"Failed to connect with the Database";
}
$empty="select Count(ProductID) from cart where UserID=".$_SESSION['ID'];
$emptyResult=$conn->query($empty);
if($emptyResult)
{
  if($row=$emptyResult->fetch_array(MYSQLI_ASSOC))
  {
    if($row['Count(ProductID)']==0)
    {
      echo"you cart is empty";

    }
    else
    {
      $sql="SELECT distinct cart.ProductID,cart.Quantity,cart.Size ,cart.CartID FROM cart inner join product_images on cart.ProductID=product_images.productID where UserID=".$_SESSION['ID'];
      $sql2="SELECT image,productID FROM product_images   GROUP BY productID";
      $sql3="select Price ,ProductID from products";
      $result=$conn->query($sql);
      $result1=$conn->query($sql2);
      $result3=$conn->query($sql3);

      //
      if(!$result)
      {
        echo"Failed to run the sql query";
      }
      else
      {


      $P_ID=array();
      $P_image=array();
      $P_price=array();
      $P_priceID=array();



      $x=0;
      $price=0;
      while($row=$result3->fetch_array(MYSQLI_ASSOC))
      {

        $P_price[$price]=$row['Price'];
        $P_priceID[$price]=$row['ProductID'];
        $price++;


      }
      $price=0;
      while($row=$result1->fetch_array(MYSQLI_ASSOC))//////from table product_images
      {
        $P_ID[$x]=$row['productID'];

       $P_image[$x]=$row['image'];
       $x++;
      }

      $y=1;
      echo "<form action='' method='get'>";

      while($row=$result->fetch_array(MYSQLI_ASSOC))/////from table cartt
      {
      for($x=0;$x<count($P_ID);$x++)
      {

      if($P_ID[$x]== $row['ProductID'])
      {


        echo "<img src=\"".$P_image[$x]."\" width='20%'><br>";

          echo "Quantity: X".$row['Quantity']."<br>";

          echo "<input type='hidden' value='".$row['CartID']."' "."name='removeeID".$y."'><br><br>";

          echo "Size: ".$row['Size']."<br>";
        for($x=0;$x<count($P_price);$x++)
          {
          if($P_priceID[$x]==$row['ProductID'])
            echo "Price: ".$P_price[$x]*$row['Quantity']." LE<br>";

          }
      }

      }

      echo "<input type='submit' value='remove' "."name='removeID".$y."'><br><br>";

      $y++;


      }
      $maxItems=$y-1;
      $y=0;
      for($x=1; $x<=$maxItems; $x++)
      {
      if(isset($_GET["removeID$x"]))
      {
        $removeQuery='DELETE FROM cart WHERE CartID ='.$_GET["removeeID$x"] ;
        $removeResult=$conn->query($removeQuery);
        if($removeResult)
        {
          echo"removed successfully!";
          header( "Location: Receipt.php" );
          exit;
        }
        else {
          echo"there was an error removing your product from the cart";
        }

      }

      }

      echo"</form>";

      }


?>
<form action="Receipt.php" method="get">
  <input type="submit" name="checkout" value="Check Out">
  <?php

    }
  }
}
?>






</form>
 <hr><br><br>
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
