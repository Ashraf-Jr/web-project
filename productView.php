<?php  session_start(); ?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="star.css" media="screen" />
  <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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
img{

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

  product view<br>
<center>
<?php
$conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
  echo"Failed to connect with the SQLiteDatabase";
}
if(isset($_GET['data']))
{
$sql="select * from products inner join product_images on products.ProductID=product_images.productID and product_images.productID=".$_GET['data'];

$result=$conn->query($sql);
if(!$result)
{
  echo"Failed to run the SQL query";
}
else
{
 $pn;
 $p;
 $d;
 $f;
 $s;
  while($row=$result->fetch_array(MYSQLI_ASSOC))
  {
   echo"<img src=\"".$row['image']."\" alt='image' width='20%%'>";
   $pn=$row['ProductName'];
   $p=$row['Price'];
   $d=$row['Description'];
   $f=$row['Fabric'];
   $s=$row['Stock'];

  }

  echo "<br><h1>".$pn."</h1>"."<br>";
  echo $p."LE"."<br>";
  echo "<p>".$d."</p><br>";
  echo "Fabric ".$f."<br>";
  if($s)
  echo "In Stock"."<br><br>";
  else {
    echo"Out of Stock<br><br><br>";
  }
  
}
}


 ?>
  <form method="post" action="">
  <input type="submit" name="cart" value="add to cart" >
  <select name="size">
    <option>Small</option>
    <option>Medium</option>
    <option>Large</option>
  </select>
  amount:<input type="number" name="amount" min="1" max="10" required >
  Write Review<input type="textarea" name="review" >
 </form>
  <br>
 <?php
 if(isset($_POST['cart']))
 {
   $conn2=mysqli_connect("localhost","root","","market place");
   if(!$conn) 
   {
     echo"Failed to connect with the Database";
   }
   //echo "hello".$_SESSION['ID'];

   $cartQuery="insert into cart (UserID,ProductID,Quantity,Size ) VALUES('".$_SESSION['ID']."','".$_GET['data']."','".$_POST['amount']."','".$_POST['size']."') ";
   $cartResult=$conn2->query($cartQuery);

   $productQuery="insert into product_review  (ProductID,UserID,Review) VALUES('".$_GET['data']."','".$_SESSION['ID']."','".$_POST['review']."') ";

   $productResult=$conn2->query($productQuery);
   if(!$productResult &&!$cartResult)
   {
     echo"Failed to run the SQL ";
   }
   else
    {
     echo"sucess";
   }
 }
  ?>
  <div class="container">
    <div class="post">
      <div class="text">Thanks for rating us!</div>
      <div class="edit">EDIT</div>
    </div>
    <div class="star-widget">
      <input type="radio" name="rate" id="rate-5">
      <label for="rate-5" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-4">
      <label for="rate-4" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-3">
      <label for="rate-3" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-2">
      <label for="rate-2" class="fas fa-star"></label>
      <input type="radio" name="rate" id="rate-1">
      <label for="rate-1" class="fas fa-star"></label>
      <form action="#">
        <header></header>
        <div class="textarea">
          <textarea cols="30" placeholder="Describe your experience.."></textarea>
        </div>
        <div class="btn">
          <button type="submit">Post</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    const btn = document.querySelector("button");
    const post = document.querySelector(".post");
    const widget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    btn.onclick = ()=>{
      widget.style.display = "none";
      post.style.display = "block";
      editBtn.onclick = ()=>{
        widget.style.display = "block";
        post.style.display = "none";
      }
      return false;
    }
  </script>
</center>
 </html>
