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


/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
</style>
</head>
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
<br><br><br>
<center>

  <div>
  <center><h1>Our Products</h1>
   <form method='post' action=''>
  <input type="search" name="search">
  <input type='submit' name='searchbutton' value='Search'>
  <?php  $categories=array("All","Jeans","shorts","t-shirts","chemise"); ?>
  <br><br>
  Categories
  <select name="categories">
    <?php

    for($x=0;$x<count($categories);$x++)
    {
      echo "<option>".$categories[$x]."</option>";
    }
     ?>
  </select>
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
         echo "<img src='".$row['image']."' alt='image' width='20%'>";

     }
      if($row=$searchResult2->fetch_array(MYSQLI_ASSOC))
     {

        echo"<br>";
        echo $row['ProductName']."<br>";
        echo $row['Description']."<br>";
        echo $row['Price']." LE<br>";


     }
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
   <a href= "productView.php?data=<?=$row['productID']?>"> <img src="<?=$row['image']?>"  alt='image' width='20%'></a>

   <?php

    $currentid=$row['productID'];

    //echo"<input type='hidden' name='productId' value=".$currentid.">";

     $nextid = $next['productID'];
     if($currentid!=$nextid)
     {
       echo"<br>";
       echo"<h1>". $row['ProductName']."</h1>"."<br>";
       echo $row['Description']."<br>";
       echo $row['Price']."<br>";
       echo"<button name='cart'>Add to Cart </button><br>";
     }




   }
   else
   {
     echo"<br>";
     echo"<h1>". $row['ProductName']."</h1>"."<br>";
     echo $row['Description']."<br>";
     echo $row['Price']."<br>";
     echo"<button name='cart'>Add to Cart </button><br>";
   }

  }

}

else {
  echo"could not run the SQL query";
}

}
 ?>
-









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
