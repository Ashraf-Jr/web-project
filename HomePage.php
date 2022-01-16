<?php session_start(); ?>
<html>
<head>
  <style>

      .bg {
              background-image: url("https://images.unsplash.com/photo-1523381294911-8d3cead13475?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9");
              height: 100%;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
  </style>

  </head>
  <header>
      <!-- <div id="top-header"> -->

          <!-- Logo -->

              <!-- <a href="HomePage.php">  <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; ></a> -->
                Deliver to <b>Egypt</b>
               <!--  <input type="search" name="search">
                <input type="button"name="search" value="search"> -->

<?php
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
?>
                Hello,Sign in Account and Lists <select><option>Account</option><option>Orders</option></select>
                <div style="float:right">
                  <?php if(isset($_SESSION['FirstName']))
                   echo " Welcome ".$_SESSION['FirstName'].""; 
                   ?>

                  <a href="chart.php"><img src="R (1).png" alt="chart" width="20" height="20"></a>
                </div>


      <!-- Image menu in Header to contain an Image and
          a sample text over that image -->
      <!-- <div id="header-image-menu"> -->
      <!-- </div> -->

  </header>
  <br>


 <div class="bg"></div>
 <div style="justify-content:space-arond;display:flex ;margin:auto;margin-top: 20px;margin-left: 20px;display:block;">
   <img src="pexels-melvin-buezo-2529157.jpg" alt="item1" width="300" height="300">
      <img src="pexels-terrance-barksdale-6481918.jpg" alt="item2" width="300" height="300">
         <img src="pexels-riyan-ong-5354609.jpg" alt="item3"width="300" height="300">
            <img src="pexels-jordan-hyde-1032110.jpg" alt="item4"width="300" height="300">
 </div>



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
