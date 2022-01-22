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

 ?><html>
<head>
  <style>
body
{
  background-color: white;
  /* #d6d6d4 */
}
      .bg {
              background-image: url("pexels-gustavo-fring-8770063.jpg");
              height: 100%;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            .wrapper {
      padding: 50px;
    }

    .image--cover {
      width: 20px;
      height: 20px;
      border-radius: 50%;

      object-fit: cover;

    }
    a
    {
    text-decoration: none;
    color:#818181;
    }
    a:hover
    {
      color:white;
    }


    .container {
  position: relative;
  width: 50%;
}

.image {
  display: block;
  /* width: 100%;
  height: auto; */
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 90%;
  opacity: 0;
  transition: .5s ease;
  background-color:#263840;
}

.container:hover .overlay {
  opacity: 0.5;
}

.text {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
.box {
margin : 10px;
display : flex;
/* width: 170px;
height: 275px; */
/* background-color: #F5FBEF; */
/* text-align:center; */
/* vertical-align: top; */
}

  </style>

  </head>
  <header>
      <!-- <div id="top-header"> -->

          <!-- Logo -->

              <!-- <a href="HomePage.php">  <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; ></a> -->
                <!-- Deliver to <b>Egypt</b> -->


                <?php
                //elhome msh betban 8er lel client 
                if(isset($_SESSION['ID']))
                {
                if ($_SESSION['Role']==1)
                {
                  include_once("client menu.php");
                }
                else if($_SESSION['Role']==2)
                {
                  include_once("admin menu.php");
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
                <!-- Hello,Sign in Account and Lists <select><option>Account</option><option>
              </option></select> -->
              <?php
              // dah el biban lel client
              if(isset($_SESSION['ID'])&& $_SESSION['Role']==1 )
              {?>
                  <?php  echo "<div style='float:left'> <a href='Profile.php'><img class='image--cover' src=".$_SESSION['Profile']." alt='profile'></a> <b style='color:#565656;'>".$_SESSION['FirstName']."</b> </div>"; ?>
                  <div style="float:right">

                <b style="color:#565656">Cart</b> <a href="chart.php"><img src="271812321_319772926730542_3413609972261165568_n.png" alt="chart" width="20" height="20"></a>
                </div>
              <?php
            } ?>



      <!-- Image menu in Header to contain an Image and
          a sample text over that image -->
      <!-- <div id="header-image-menu"> -->
      <!-- </div> -->

  </header>
  <br>


 <a href="OurProducts.php"><div class="bg"></div></a>
 <div class="box">
  <div  class="container">  <img src="pexels-karolina-grabowska-4210863.jpg" alt="item1" width="90%" height="100%" >
   <div class="overlay"><div class="text">Denims</div></div></div>
      <div class="container"><img src="pexels-dasha-musohranova-6051248.jpg" alt="item2" width="90%" height="100%">
      <div class="overlay"><div class="text">Tops</div></div></div>

         <div class="container"><img src="pexels-daria-shevtsova-1030946 (1).jpg" alt="item3"width="90%" height="100%">
         <div class="overlay"><div class="text">Pullover</div></div></div>

            <!-- <img src="pexels-jordan-hyde-1032110.jpg" alt="item4"width="300" height="300"> -->
 </div>
 <br><br>



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
