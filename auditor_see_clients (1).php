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
input[type=text],input[type=password], select {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

</style>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<center>
<h2>choose</h2>

<form action="" method="post">

<?php
$conn=mysqli_connect("localhost","root","","market place");
$getadmins="select distinct Fromm,FirstName ,LastName,Too,UserID from chat inner join user where chat.Fromm=user.UserID and user.RoleType=2";
$resultGetClients=$conn->query($getadmins);

$clients=array();
$client=0;
$admins=array();
$admin=0;

$adminID=array();
$clientId=array();

if($resultGetClients)
{
  while($row=$resultGetClients->fetch_array(MYSQLI_ASSOC))
  {
     $admins[$admin]=$row['FirstName']." ".$row['LastName'];
     $adminID[$admin]=$row['UserID'];
     $admin++;
  }
}

$getadmins="select distinct Fromm,FirstName,LastName, Too,UserID from chat inner join user where chat.Fromm=user.UserID and user.RoleType=1";
$resultGetClients=$conn->query($getadmins);
if($resultGetClients)
{
  while($row=$resultGetClients->fetch_array(MYSQLI_ASSOC))
  {
     $clients[$client]=$row['FirstName']." ".$row['LastName'];
     $clientID[$client]=$row['UserID'];
     $client++;
  }
}

 ?>

 View Admins: <select name='admins'>
   <?php

   for($x=0;$x<count($admins);$x++)
   {

  echo" <option value='$adminID[$x]'>  $admins[$x]  </option>";
   }

    ?>
  </select> <br><br>


View Clients:  <select name="clients">

    <?php
    for($x=0;$x<count($clients);$x++)
    {
       echo"<option value='$clientID[$x]'>$clients[$x]</option>";
    }
     ?>
   </select>

<br>
<input type="submit" name="Go" value="Go">
     <?php
     if(isset($_POST['Go']))
  {
    echo "<input type='hidden' name='cID' value=".$_POST['clients'].">";
    echo "<input type='hidden' name='aID' value=".$_POST['admins'].">";
     $clientIDD=$_POST['clients'];
     $adminIDD=$_POST['admins'];
     // echo $clientIDD."<br>";
     $_SESSION['CID']=$clientIDD;
     $_SESSION['AID']=$adminIDD;
     // echo $adminIDD;
     echo "<h2>view chat</h2>";

     $conn=mysqli_connect("localhost","root","","market place");
?>

<table class="table table-striped">
  <?php
  $getMessage = "SELECT  chat.* ,user.FirstName FROM chat INNER JOIN user on Fromm=user.UserID  WHERE Fromm =". $adminIDD." AND Too = ".$clientIDD." OR Fromm = ".$clientIDD." AND Too =". $adminIDD." ORDER BY Time asc";
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

  ?>
  </table>
    <input type="text" name = "comment" class="form-control" placeholder = "Type your message here" /><br>
   <input type="submit" value="send" name="btn">
   <input type="submit" formaction="#"value="HR" name="hr">
   <input type="submit"value="survey" name="survey">




<?php

}
else if(isset($_POST['btn']))
{
	echo "<input type='hidden' name='cID' value=".$_POST['clients'].">";
    echo "<input type='hidden' name='aID' value=".$_POST['admins'].">";

  $clientIDD=$_SESSION['CID'];
  $adminIDD=$_SESSION['AID'];
  $comment = $_POST['comment'];
  $auditorID=$_SESSION['ID'];
	$sendComment = "INSERT INTO auditorcomment(auditorID,clientID,adminID,comment) VALUES($auditorID,$clientIDD,$adminIDD,'$comment')";
	mysqli_query($conn,$sendComment) or die(mysqli_error($conn));


}
else if(isset($_POST['survey']))
{
  $createdAt = date("Y-m-d h:i:sa");
  $sent_by = $_SESSION['ID'];
  $receiver = $_SESSION['CID'];
  $surveypath = "surveyform.php";
  $seen=1;
  $sendMessage = "INSERT INTO chat(Fromm,Too,Message,Time,State) VALUES('$sent_by','$receiver','$surveypath','$createdAt','$seen')";
  // echo $sendMessage;
  mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));



}
else if(isset($_POST['hr']))
{
  $createdAt = date("Y-m-d h:i:sa");
  $sent_by = $_SESSION['ID'];
  $receiver = 39;
  $misbehave = "Misbehaviour happened from AdminID ".$_SESSION['AID']." !!!";
  $seen=1;
  $sendMessage = "INSERT INTO chat(Fromm,Too,Message,Time,State) VALUES('$sent_by','$receiver','$misbehave','$createdAt','$seen')";
  // echo $sendMessage;
  mysqli_query($conn,$sendMessage) or die(mysqli_error($conn));


}

?>
</form>
</center>

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
