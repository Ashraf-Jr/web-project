
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
  /* background-color: #04AA6D; */
  background-color: #9F2B00;

  color: white;
}
</style>


<body>
<?php

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

$query = "select * from survey";

$results = $conn->query($query) ;


echo "<table class='form' border=1 id='customers'>";
echo "
 <tr>
<th>SurveyID </th>
<th>ClientID</th>
<th>Quality</th>
<th>Purchase Experience</th>
<th>Usage Experience</th>
<th>First use Experience</th>
<th>Satisfaction upon new product</th>
<th>Customer service</th>
<th>Problem resolved</th>
 </tr>";
while ($row = $results->fetch_array(MYSQLI_ASSOC) ) {

?>
<tr>
<td><?php echo $row['surveyID'] ?> </td>
<td><?php echo $row['clientID'] ?> </td>
<td><?php echo $row['quality'] ?> </td>
<td><?php echo $row['purchase'] ?> </td>
<td><?php echo $row['usagee'] ?> </td>
<td><?php echo $row['firstuse'] ?> </td>
<td><?php echo $row['satisfiction'] ?> </td>
<td><?php echo $row['customerservice'] ?> </td>
<td><?php echo $row['problems'] ?> </td>
</tr>

<?php
}
?>
</table>
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
