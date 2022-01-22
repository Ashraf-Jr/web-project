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

}
else
{
include_once("menu.php");
}
 ?>
<html>
<head>
  <!-- <link rel="stylesheet" href="style.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="star.css" media="screen" /> -->
  <!-- <link rel="stylesheet" href="style.css"> -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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


.wrapper {
  /* padding: 50px; */
}

.image-cover {

  border-radius: 10%;

  object-fit: cover;
  object-position: center ;
}

.image--cover {
  width: 40px;
  height: 40px;
  border-radius: 50%;

  object-fit: cover;
  object-position: center ;
}

</style>
</head>
<header>



</header>
<br><br>
  <?php


  ?>
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
   echo"<img class='image-cover' src=\"".$row['image']."\" alt='image' width='20%%'>";
   $pn=$row['ProductName'];
   $p=$row['Price'];
   $d=$row['Description'];
   $f=$row['Fabric'];
   $s=$row['Stock'];

  }


  echo "<br><h2>".$pn."</h2>"."<br>";
  ?>
</div >
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





  </div>
  <?php
  echo $p."LE"."<br>";
  echo "<p>".$d."</p><br>";
  echo "Fabric ".$f."<br>";
  if($s)
  echo "In Stock"."<br><br>";
  else {
    echo"Out of Stock<br><br>";
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
  amount:<input type="number" name="amount" >
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
   if(!$cartResult)
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
      <!-- <div class="text">Thanks for rating us!</div> -->
      <!-- <div class="edit">EDIT</div> -->


      <!-- <form action="#"> -->
      <br><br>
      <form method="post" action="">

        <header></header>
        <div class="textarea">

          <?php
          if(isset($_SESSION['ID']))
          {
          $userID=$_SESSION["ID"];
          $ProID=$_GET['data'];
          // echo $ProID;
          // echo $review;
          if(isset($_POST['post']))
          {
            $review="INSERT INTO product_review (ProductID,UserID,Review) VALUES ($ProID,$userID,'".$_POST['review']."')";

          $reviewResult=$conn->query($review);
          if($review)
          {
            // echo"thanks for submiting";
          }
          else
          {
            echo"sorry,somthing went wrong";
          }
        }
      }

        $viewReview="SELECT * FROM product_review INNER JOIN user ON user.UserID = product_review.UserID";
        $viewReviewResult=$conn->query($viewReview);

        if($viewReviewResult)
        {
          while($row=$viewReviewResult->fetch_array(MYSQLI_ASSOC))
          {
            if($_GET['data']==$row['ProductID'])
            {
            ?>
          <img  class="image--cover" src="<?=$row['ProfilePicture']?>" alt="ProfilePicture" width="5%">
            <?php
            echo "<b>".$row['FirstName']." ".$row['LastName']."</b><br>";

            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['Review']."<br>";
}
          }
        }

           ?>

           <?php
           if(isset($_SESSION['ID']))
           {
             ?>
           <textarea cols="30" placeholder="Describe your experience.." name=review></textarea>
           <div class="btn">
             <input type="submit" name='post' value="Post">
           </div>

<?php
        }
        ?>
        </div>


      </form>
  </div>
  <script>
    // const btn = document.querySelector("button");
    // const post = document.querySelector(".post");
    // const widget = document.querySelector(".star-widget");
    // const editBtn = document.querySelector(".edit");
    // btn.onclick = ()=>{
    //   widget.style.display = "none";
    //   post.style.display = "block";
    //   editBtn.onclick = ()=>{
    //     widget.style.display = "block";
    //     post.style.display = "none";
    //   }
      // return false;
    //}
  </script>
</center>
<footer style="background-color:#ededed;width:100%;background-color:#263840;color:#818181;">
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
