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
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<!-- <h1>view message</h1> -->
<?php
$receiver = $_GET['client']; //el ana hab3tloo

$conn=mysqli_connect("localhost","root","","market place");
$getReceiver = "SELECT * FROM user WHERE UserID = '$receiver'";
$getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
$getReceiverRow = mysqli_fetch_array($getReceiverResult);
?>
<strong><?=$getReceiverRow['FirstName']?></strong>
<table class="table table-striped">
  <?php
  $getMessage = "SELECT  chat.* ,user.FirstName FROM chat INNER JOIN user on Fromm=user.UserID  WHERE Fromm = '$receiver' AND Too = ".$_SESSION['ID']." OR Fromm = ".$_SESSION['ID']." AND Too = '$receiver' ORDER BY Time asc";
  $getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
  if(mysqli_num_rows($getMessageResult) > 0) {
  	while($getMessageRow = mysqli_fetch_array($getMessageResult)) {	?>
  	<tr><div style = "margin: 10;">
  	<td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['FirstName']?></h4></td>
  	<td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['Message']?></p></td>
  		</div>
  		</tr>
  <?php }
  }
  else {
  	echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
  }
  ?>
  </table>
  <form class="form-inline" action="" method = "POST">
  	<input type="hidden" name = "sent_by" value = "<?=$_SESSION['ID']?>"/>
  	<input type="hidden" name = "received_by" value = "<?=$receiver?>"/>
  	<input type="text" name = "message" class="form-control" placeholder = "Type your message here" required/>
  	<input type = "submit" value='send' name='submit' class="btn btn-default">
  </form>

</html>
<?php
if(isset($_POST['submit']))
 {
	$createdAt = date("Y-m-d h:i:sa");
	$sent_by = $_POST['sent_by'];
	$receiver = $_POST['received_by'];
	$message = $_POST['message'];
  $seen=1;
	$sendMessage = "INSERT INTO chat(Fromm,Too,Message,Time,State) VALUES('$sent_by','$receiver','$message','$createdAt','$seen')";
  // echo $sendMessage;
	mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));
  // header( "Location: AdminViewMessage.php" );


}
?>
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
