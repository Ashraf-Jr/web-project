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
<?php
// echo $_POST['admins']." <br>";
// echo $_POST['clients'];
//
echo $_POST['cID']."<br>";
echo $_POST['aID'];
?>
<html>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<h1>view message</h1>
<?php
// $receiver = $_GET['client']; //el ana hab3tloo

// include "menu.php";
$conn=mysqli_connect("localhost","root","","market place");
if(isset($_POST['Go']))
{
$clientID = $_POST['cID'];
$adminID = $_POST['aID'];
// $getReceiver = "SELECT * FROM user WHERE UserID = '$receiver'";
// $getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
// $getReceiverRow = mysqli_fetch_array($getReceiverResult);
?>
<!-- <strong><?=$getReceiverRow['FirstName']?></strong> -->
<table class="table table-striped">
  <?php
  $getMessage = "SELECT  chat.* ,user.FirstName FROM chat INNER JOIN user on Fromm=user.UserID  WHERE Fromm =". $adminID." AND Too = ".$clientID." OR Fromm = ".$clientID." AND Too =". $adminID." ORDER BY Time asc";
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
}
  ?>
  </table>
  <form class="form-inline" action="auditor_chat.php" method = "POST">
  	<input type="text" name = "comment" class="form-control" placeholder = "Type your message here" required/>
  	<!-- <input type = "button" value='submit' name='submit' class="btn btn-default"> -->
   <input type="submit" value="send" name="btn">

  </form>

</html>
<?php

if(isset($_POST['btn']))
 {
	// $createdAt = date("Y-m-d h:i:sa");

  //
  //
	$comment = $_POST['comment'];
  echo $comment;
  echo "ana mariaam";
  $auditorID=$_SESSION['ID'];
	$sendComment = "INSERT INTO auditorcomment(auditorID,clientID,adminID,comment) VALUES($auditorID,$clientID,$adminID,$comment)";
  // echo $sendMessage;
	mysqli_query($conn,$sendComment) or die(mysqli_error($conn));

  // $url_a="http://localhost/tryy/auditor_chat.php?cID=$clientID&aID=$adminID";
  // $data_a=file_get_contents($url_a);
  // echo $data_a;
  // header( "Location: AdminViewMessage.php" );


}
else
{
  echo"dgdh";
}
?>
