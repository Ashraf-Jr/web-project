<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "market place";

$conn = new mysqli($servername, $username, $password, $dbname);

//include "menu.php";

?>

<form class="form-inline" method = "POST" action = "">
<input type="text" name = "name" placeholder="Search" class="form-control">
<input type="submit" value='Search' name='search' class="btn btn-default">
</form>
<?php
if(isset($_POST['search']))
{
$search=$_POST['name'];
$searchUser = "SELECT * FROM user WHERE FirstName = '$search'";
$searchUserResult = mysqli_query($conn,$searchUser);

while($searchUserRow = mysqli_fetch_array($searchUserResult))
{  ?>
  <div>
  <?=$searchUserRow['FirstName']?>
  <a href="chat.php?receiver=<?=$searchUserRow['UserID']?>">Send message</a>
  </div>
<?php }
}
?>
<div>
<?php
$lastMessage = "SELECT DISTINCT Fromm FROM chat WHERE Fromm = ".$_SESSION['ID'];  //get all the messages that i'm as a sender included in
$lastMessageResult = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn)); // run SQL
if(mysqli_num_rows($lastMessageResult) > 0) //number of rows outputed
{
  while($lastMessageRow = mysqli_fetch_array($lastMessageResult))
  {
  $sent_by = $lastMessageRow['Fromm'];  //from
  $getSender = "SELECT * FROM user WHERE UserID = '$sent_by'";  ////checking who is the sender
  $getSenderResult = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
  $getSenderRow = mysqli_fetch_array($getSenderResult);
  ?>
  <div>
  <?=$getSenderRow['FirstName'];?>
  <a href="chat.php?receiver=<?=$sent_by?>">Send message</a>
  </div><br>
<?php }
}
else {
echo "No conversations yet!";
}
?>
</div>
</html>
