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
else {
  include_once("menu.php");

}
 ?>
<html>
<head>

    <style>
    .margin
    {
      margin-left: 100px;
      margin-right: 100px;
    }


    </style>
    <body >
    <header>
    </header>
    <br><br><br>


    <center><h1>About US</h1></center>
<div class="margin">
  <h3>WHO WE ARE</h3>
  <p>We'are sales performance agency.We've been helping businesses drive revenue with the use of inbound marketing and sales
    enablement tactics since 2012 .We've a proud HubSpot platinium and pride ourselves on using
    the best tool to help our clients succeed.Our team is made up of smart and taneted people that are passionate about creatng inbound sales results!
  </p>
  <h4>We're Different than the Rest</h4>
</p><b>We're rooted in sales</b>.Our parent company .The center for Sales Strateft(CSS),has been helping Sales
orgainizatios turn talent into performance for almost 40 years .Unlike other marketing agencies ,we're obssesed with ROI and we have experience to deliver
inbound sales results because we've done it ourselves...
</p>
</p><b>We've been where you are</b>.More than a decade ago,when we need to grow and diverse how we generated new business at CSS, we turned
to inbound marketing and found huge success after launching our sales strategy blog.Once we mastered
the art of using though leadership content for lead generation ,we laubnched LeadG2 so we could help businesses do the exact same thing.
</p>
</div>



<footer style="background-color:#ededed;width:100%;background-color:#263840;color:#818181;position:absolute;bottom:0px">
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
  </body>

  </html>
