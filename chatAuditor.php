<?php  session_start();?>
<html>
<h1>Auditor chats</h1>

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
echo "<strong>Your Inbox</strong><br>";
$conn=mysqli_connect("localhost","root","","market place");
$getClients="select distinct Fromm,FirstName from chat inner join user where chat.Fromm=user.UserID ";
$getClientsResult=$conn->query($getClients);
if($getClientsResult)
{
  while($row=$getClientsResult->fetch_array(MYSQLI_ASSOC))
  {
    ?>
    <a href="AdminViewMessage.php?client=<?=$row['Fromm']?>"><?=$row['FirstName'] ?></a><br>
    <?php
  }
}
else
{
echo"No messages sent yet";
}


 ?>
 <form>
   <button>Add Comment</button>
    <button>Request Investigation</button>
 </form>
</html>
