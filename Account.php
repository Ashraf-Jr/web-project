<html>
<head>
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
  <style>

        /* Style page content */
        .main {
          margin-left: 160px; /* Same as the width of the sidebar */
          padding: 0px 10px;
        }
        a:hover
        {
          color:white;
        }
        a{
          text-decoration: none;

          color:#818181;
        }

/* <button class="button-58" role="button">Button 58</button> */

/* CSS */
.button-58 {
  align-items: center;
   background-color:non;
  /* border: 2px solid #06f; */
  /* box-sizing: border-box; */
  cursor: pointer;
  fill: #000;
  font-family: Inter,sans-serif;
  font-size: 20px;
  font-weight: 600;
  height: 48px;
  justify-content: center;
  letter-spacing: -.8px;
  /* line-height: 24px; */
  min-width: 140px;
  /* outline: 0; */
  padding: 0 17px;
  text-align: center;
  text-decoration: none;
  transition: all .3s;

}


.button-58:hover {
  background-color: #FF5349;
  border-color: none;
  /* fill: #06f; */
}




}
  </style>
<header>



</header>

</head>
<center>
<h1 style="color:#333333">My Account</h1>
<center>
<a href="#" ><button class="button-58"> Orders</a></button><br>
<a href="chatClient.php"> <button class="button-58"> Inbox</li></a></button><br>
  <a href="Profile.php"> <button class="button-58">Profile</li> </a></button><br>
  <!-- <button class="button-58"><li>Wish List</li></button><br> -->
</center>

<footer class="footer" style="background-color:#263840;color:#818181;position:absolute;bottom:0px;width:100%">
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

