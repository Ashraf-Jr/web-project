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
<style>


.inbox
{
  margin: 30px;
  padding: 10px;
  border-style: solid;
  width:50%;

}

</style>
<!-- <h1>Admin chats</h1> -->

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
}
echo "<center><div class='inbox'><strong>Your Inbox</strong><br>";
$conn=mysqli_connect("localhost","root","","market place");
$getClients="select distinct Fromm,FirstName from chat inner join user where chat.Fromm=user.UserID ";
$getClientsResult=$conn->query($getClients);
if($getClientsResult)
{
  while($row=$getClientsResult->fetch_array(MYSQLI_ASSOC))
  {
    ?>
    <a  href="AdminViewMessage.php?client=<?=$row['Fromm']?>"><?=$row['FirstName'] ?></a><br>
    <?php
  }
}
else
{
echo"No messages sent yet";
}

 ?>
</div></center>
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
</html>
