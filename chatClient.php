<html>

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
    include_once("auditormenu.php");
  }
  
}
else
{
    include_once("menu.php");  
}


?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php

// session start

// include DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "market place";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$getAdmin="select UserID from user where RoleType=2 ";
//echo $getAdmin;
$AdminResult=$conn->query($getAdmin);
$admin=0;
$adminArray=array();
if($AdminResult)
{
   while($row=$AdminResult->fetch_array(MYSQLI_ASSOC))
  {
    $adminArray[$admin]=$row['UserID'];
        $admin++;

  }
}
echo count($adminArray)."<br>";

if(isset($_POST['submit']))
{
$createdAt = date("Y-m-d h:i:sa");
$sent_by = $_POST['sent_by'];
//$receiver = $_POST['received_by'];
$message = $_POST['message'];
$seen=0;
for($x=0;$x<count($adminArray);$x++)
{
$sendMessage = "INSERT INTO chat(Fromm,Too,Message,Time,state) VALUES('$sent_by','$adminArray[$x]','$message','$createdAt','$seen')";
echo $sendMessage."<br>";
mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));

}

}
// $receiver = $_GET['receiver']; //el ana hab3tloo
// include "menu.php";
//
// $getReceiver = "SELECT * FROM user WHERE Userid = '$receiver'";
// $getReceiverResult = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
// $getReceiverRow = mysqli_fetch_array($getReceiverResult);
// 
?>
<strong>To Admins </strong>

 <strong><?//=$getReceiverRow['FirstName']?></strong>

 <table class="table table-striped">
 <?php
 for($x=0;$x<count($adminArray);$x++)
 {
 
 $getMessage = "SELECT  chat.* , user.FirstName FROM chat INNER JOIN user on Fromm=user.UserID  WHERE Fromm = '$adminArray[$x]' AND Too = ".$_SESSION['ID']." OR Fromm = ".$_SESSION['ID']." AND Too = '$adminArray[$x]'";

// //echo $getMessage."<br>";
///to get the history of messages between client and adminArray
 $getMessageResult = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));

 if(mysqli_num_rows($getMessageResult) > 0)
{
 while($getMessageRow = mysqli_fetch_array($getMessageResult))
 {	?>

 <tr><div style = "margin: 10;">
 <td>	<h4 style = "color: #007bff;display:inline"><?=$getMessageRow['FirstName']?></h4></td>
 <td>	<p class="text-center" style = "display:inline"><?=$getMessageRow['Message']?></p></td>
   </div>
   </tr>
 <?php
 }

 }
 else
 {
 echo "<tr><td><p>No messages yet! Say 'Hi'</p></td></tr>";
 }
}
 ?>
 </table>


 <form class="form-inline" action="" method = "POST">
 <input type="hidden" name = "sent_by" value = "<?=$_SESSION['ID']?>"/>
 <input type="hidden" name = "received_by" value = "<?//=$receiver?>"/>
 <input type="text" name = "message" class="form-control" placeholder = "Type your message here" required/>
 <input type = "submit" value='send' name='submit' class="btn btn-default">
 </form>


 <?php

?>
</body>
</html>
