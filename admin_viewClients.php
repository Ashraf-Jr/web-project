<!DOCTYPE html>
<html>
<body>

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

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

$query = "SELECT user.UserID, user.FirstName, user.LastName, user.Address, user.Password, user.Gender, user.DateOfBirth, user.ProfilePicture ,user.RoleType, user.Email, user.Phone
FROM user
INNER JOIN userrole ON user.RoleType = userrole.RoleID AND userrole.role='client'";


$results = $conn->query($query);

echo "<table border=1>";
echo "
 <tr>
<th>UserID</th> 
<th>FirstName</th>
<th>LastName</th>
<th>Address</th> 
<th>Password</th>
<th>Gender</th>  
<th>DateOfBirth</th> 
<th>ProfilePicture</th> 
<th>RoleType</th> 
<th>Email</th> 
<th>Phone</th> 
 </tr>";
while ($row = $results->fetch_array(MYSQLI_ASSOC) ) {
?>
<tr>
<td><?php echo $row['UserID'] ?> </td>
<td><?php echo $row['FirstName'] ?> </td>
<td><?php echo $row['LastName'] ?> </td>
<td><?php echo $row['Address'] ?> </td>
<td><?php echo $row['Password'] ?> </td>
<td><?php echo $row['Gender'] ?> </td>
<td><?php echo $row['DateOfBirth'] ?> </td>
<td><?php echo $row['ProfilePicture'] ?> </td>
<td><?php echo $row['RoleType'] ?> </td>
<td><?php echo $row['Email'] ?> </td>
<td><?php echo $row['Phone'] ?> </td>
</tr>

<?php
}
?>


</body>
</html>