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
<h3 style="margin-left:5px"> HR chat </h3>
<form action="" method="post">
<?php
$conn=mysqli_connect("localhost","root","","market place");
 $getMessage = "SELECT  chat.* ,user.FirstName FROM chat INNER JOIN user on Fromm=user.UserID  WHERE Fromm =38 AND Too = 39 ORDER BY Time asc";
$getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
if(mysqli_num_rows($getMessageResult) > 0)
{
  while($getMessageRow = mysqli_fetch_array($getMessageResult))
  {	?>
  <tr><div style = "margin: 10;">
  <td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['FirstName']?></h4></td>
  <td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['Message']?></p></td>
  <?php
  $adminID=filter_var($getMessageRow['Message'], FILTER_SANITIZE_NUMBER_INT);
  ?>
  <input type="submit" name="panelty"  value="<?="panelty "."ID ".$adminID?>">

    </div>
    </tr>
<?php
if(isset($_POST['panelty']))
{
  echo" Panelty Printed";
}

}

}
?>
</form>

<footer class="footer" style="background-color:#263840;color:#818181;position:absolute;width:100%;bottom:0px">
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
