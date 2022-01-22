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
th.row{
	padding:5px
}
th{
	text-align: left;
}
.form{
  margin-left: 50px;
  margin-right: 50px;
}

</style><br>
<?php

?>
<br>
<form class="form"action="" method="post">
<strong>How important was performance on these attributes?</strong><br>

<table>
<tr>
<th> </th>
<th class="row">Not Important</th>
<th class="row">Somewhat important </th>
<th class="row">Important</th>
<th class="row">Very important</th>
</tr>
<tr>
<th>Overall Quality</th>
<center>
<td><input type=radio name="row1" value="Not Importnant"></td>
<td><input type=radio  name="row1" value="Somewhat Importnant"></td>
<td><input type=radio  name="row1" value="Importnant"></td>
<td><input type=radio  name="row1" value="Very Importnant"></td>
</center>
</tr>



<th>Purchase Experience</th>
<center>
<td><input type=radio  name="row3" value="Not Importnant"></td>
<td><input type=radio  name="row3" value="Somewhat Importnant"></td>
<td><input type=radio  name="row3" value="Importnant"></td>
<td><input type=radio  name="row3" value="Very Importnant"></td>
</center>
</tr>

<th>Usage Experience </th>
<center>
<td><input type=radio  name="row4" value="Not Importnant"></td>
<td><input type=radio  name="row4" value="Somewhat Importnant"></td>
<td><input type=radio  name="row4" value="Importnant"></td>
<td><input type=radio  name="row4" value="Very Importnant"></td>
</center>
</tr>

<th>Installation of First Use Experience</th>
<center>
<td><input type=radio  name="row5" value="Not Importnant"></td>
<td><input type=radio  name="row5" value="Somewhat Importnant"></td>
<td><input type=radio  name="row5" value="Importnant"></td>
<td><input type=radio  name="row5" value="Very Importnant"></td>
</center>
</tr>
</table>
<br><br>
<p><strong>Overall, how satisfied were you with your new product?</strong></p>
<input type=radio  name="q2" value="Not at all Satisfied">Not at all Satisfied<br>
<input type=radio  name="q2" value="Somewhat Satisfied">Somewhat Satisfied<br>
<input type=radio  name="q2" value="Satisfied">Satisfied<br>
<input type=radio  name="q2" value="Very Satisfied">Very Satisfied<br>
<input type=radio  name="q2" value="Delighted">Delighted

<br><br>

<p><strong>Have you ever contacted Customer service?</strong></p>
<input type=radio  name="q3" value="Yes">Yes<br>
<input type=radio  name="q3" value="No">No

<br><br>

<p><strong>If you contacted [Company] customer service, have all problems been resolved to your complete satistfaction ??</strong></p>
<input type=radio  name="q4" value="Yes,by the compant or its representatives">Yes, by the company or its representatives<br>
<input type=radio  name="q4" value="Yes,by me or someone outside the company">Yes, by me or someone outside the company<br>
<input type=radio  name="q4" value="No,the problem was not resolved">No, the problem was not resolved

<br><br><br>

<?php
if($_SESSION['Role']==1 )
{
echo '<input type="submit" value="submit" name="submit">';
$conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
	die("cannot connect with the database");
}

if(isset($_POST['submit']))
{
	$sql="INSERT INTO survey (clientID, quality, purchase, usagee,firstuse, satisfiction,customerservice, problems)
VALUES (".$_SESSION['ID'].",'".$_POST['row1']."', '".$_POST['row3']."','".$_POST['row4']."','".$_POST['row5']."','".$_POST['q2']."','".$_POST['q3']."','".$_POST['q4']."')";

	$result=$conn->query($sql);
	if(!$result)
	{
		die("no connection with the database");
	}
}


}

?>

<br><br><br>

<hr>
</form>
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
