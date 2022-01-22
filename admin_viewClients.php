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
<!DOCTYPE html>
<html>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #9F2B00;
  color: white;
}
</style>
<body>

<?php


$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

$query = "SELECT user.UserID, user.FirstName, user.LastName, user.Address, user.Password, user.Gender, user.DateOfBirth, user.ProfilePicture ,user.RoleType, user.Email, user.Phone
FROM user
INNER JOIN userrole ON user.RoleType = userrole.RoleID AND userrole.role='client'";


$results = $conn->query($query);

echo "<table border=1 id='customers'>";
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
