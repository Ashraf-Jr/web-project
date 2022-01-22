<html>
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
  }
  else
  {
  include_once("menu.php");
  }
  ?>
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

.box {
margin : 10px;
display : inline-block;
width: 170px;
height: 275px;
/* background-color: #F5FBEF; */
text-align:center;
vertical-align: top;
}
.image--cover {

  border-radius: 10%;

  object-fit: cover;

}


/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
</style>
</head>

<br><br><br>
<center>

  <div>
  <center><h1>Our Products</h1>
   <form method='post' action=''>
  <input type="search" name="search">
  <input type='submit' name='searchbutton' value='Search'>
  <?php  $categories=array("jeans","dress","shirt","sweater"); ?>
  <br><br>
  Categories

  <form  method='post' action=''>
  <select name="categories">
    <?php

    for($x=0;$x<count($categories);$x++)
    {
      echo "<option>".$categories[$x]."</option>";
    }
     ?>
  </select>
    <input type='submit' name='categorybutton' value='categories'>

</form>
<?php
$conn=mysqli_connect("localhost","root","","market place");
if(isset($_POST['categorybutton']))
  {

  $query="select * from products inner join product_images on products.ProductID=product_images.productID where products.Category LIKE '%".$_POST['categories']."%'";

  $Result=$conn->query($query);

   if($Result)
   {
     echo"<br><br>";
     while($row=$Result->fetch_array(MYSQLI_ASSOC))
     {
       ?>
       <div class="box">
       <a href= "productView.php?data=<?=$row['productID']?>"> <img class="image--cover" src="<?=$row['image']?>"  alt='image' width='100%'></a>

       <?php
        echo "<b>".$row['ProductName']."</b><br>";
        // echo $row['Description']."<br>";
        echo $row['Price']." LE</div>";
     }
    }
 }
else
{



   ?>

  <?php
  $conn=mysqli_connect("localhost","root","","market place");

  if(isset($_POST['searchbutton']))
  {

  $searchData="select * from products inner join product_images on products.ProductID=product_images.productID where ProductName LIKE '%".$_POST['search']."%'" ;

  //echo $searchData;
  $searchResult=$conn->query($searchData);
  $searchResult2=$conn->query($searchData);

   if($searchResult)
   {
     echo"<br><br>";
     while($row=$searchResult->fetch_array(MYSQLI_ASSOC))
     {
       ?>
       <div class="box">
       <a href= "productView.php?data=<?=$row['productID']?>"> <img class="image--cover" src="<?=$row['image']?>"  alt='image' width='100%'></a>

    <?php
        echo "<b>".$row['ProductName']."</b><br>";
        // echo $row['Description']."<br>";
        echo $row['Price']." LE</div>";
  }/////enddd
     //  if($row=$searchResult2->fetch_array(MYSQLI_ASSOC))
     // {
     //
     //    // echo"<br>";
     //    echo "<h5>".$row['ProductName']."</h5>";
     //    // echo $row['Description']."<br>";
     //    echo $row['Price']." LE<br></div>";
     //
     //
     // }
     //echo"search done";

   }
   else
   {
     echo"something went wrong try again!";
   }


}
   ?>


</form>
  </center>
</div><br>


<?php
if(!$conn)
{
  echo("Failed to connect with the Database");
}
if(!isset($_POST['searchbutton']))
{

$query="select * from products inner join product_images on products.ProductID=product_images.productID  ";
$result=$conn->query($query);
$result1=$conn->query($query);

if($result)
{
  $next=$result1->fetch_array(MYSQLI_ASSOC);

  while($row=$result->fetch_array(MYSQLI_ASSOC))
  {
    $next=$result1->fetch_array(MYSQLI_ASSOC);
    if($next!=null)
    {
    //  $id=row['productID'];
?>
<div class="box">
   <a href= "productView.php?data=<?=$row['productID']?>"> <img  class="image--cover"src="<?=$row['image']?>"  alt='image' width='100%'></a>

   <?php

    $currentid=$row['productID'];

    //echo"<input type='hidden' name='productId' value=".$currentid.">";

     $nextid = $next['productID'];
     if($currentid!=$nextid)
     {
       // echo"<br>";
       echo"<b>". $row['ProductName']."</b><br>"."";
       // echo $row['Description']."<br>";
       echo $row['Price']." LE<br><br></div>";
       // echo"<button name='cart'>Add to Cart </button><br>";
     }




   }
   else
   {
     ?>
     <div class="box">
     <a href= "productView.php?data=<?=$row['productID']?>"> <img  class="image--cover"src="<?=$row['image']?>"  alt='image' width='100%'></a>
<?php

     // echo"<br>";
     echo"<b>". $row['ProductName']."</b><br>"."";
     // echo $row['Description']."<br>";
     echo $row['Price']." LE <br><br></div>";
     // echo"<button name='cart'>Add to Cart </button><br>";
   }

  }

}

else {
  echo"could not run the SQL query";
}

}
}
 ?>
<br><br><br>









</center>

<footer style="background-color:#ededed;">
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
