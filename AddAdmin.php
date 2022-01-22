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
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.form {
  margin-left:300;
  margin-right: 300;
}
input[type="date"]:-webkit-datetime-edit-day-field{
  position: absolute !important;
  color:#000;
  padding: 2px;
  left: 4px;

}
label
{
font-weight: bold;
}

</style>
<body>
<?php


 echo "<br>";
$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

echo "<form class='form'action='AddAdmin.php' method='post' enctype='multipart/form-data'>";
echo"<label>upload profile picture</label><br>";
echo "<input type='file' name='profile' value=''  required ><br>";
echo "<label>First Name:</label><br> <input type= 'text'  name= 'FirstName' ><br>";
echo "<label>Last Name:</label><br> <input type= 'text'  name= 'LastName' ><br>";
echo "<label>Address:<br></label> <input type= 'text'  name= 'Address' ><br>";
echo '<label>Birth Date</label><input type="date" name="date" value=""required><br>';
echo "<label>Email:</label><br> <input type= 'text'  name= 'Email' ><br>";
echo "<label>Password:<br></label> <input type= 'password'  name= 'Password' ><br>";

echo "<label>Phone:</label><br> <input type= 'text'  name= 'Phone' ><br>";
echo "<label>Gender:</label><br>";
echo "<label>male</label> <input type= 'radio'  name= 'Gender' value='male' > ";
echo "<label>female</label> <input type= 'radio'  name= 'Gender'  value='female' ><br><br>";
echo "<input type= 'submit'  name= 'submit'  value= 'Submit' >";
echo"</form>";


if(isset($_POST['submit']))
{

  $target_dir="admins/";
  $target_file=$target_dir.basename($_FILES["profile"]["name"]);
  $uploadOK=1;
  $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 if($imageFileType!="jpg" && $imageFileType !="png" && $imageFileType!="jepg")
{
  echo"Sorry,only JPG , JPEG & PNG files are allowed";
  $uploadOK=0;
}
else if($uploadOK==0)
{
  echo"Sorry,your file was not uploaded!";
}
else if($uploadOK!=0)
{
  if(move_uploaded_file($_FILES["profile"]["tmp_name"],$target_file))
  {
    echo"The file has been uploaded";
  }
  else
   {
    echo"Sorry,there was an error uploading your file";
  }
}




$sql = "INSERT INTO user ( FirstName, LastName ,Address,Password,Gender, DateOfBirth , RoleType , Email,Phone,ProfilePicture)
VALUES ('".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['Address']."','".$_POST['Password']."','".$_POST['Gender']."','".$_POST['date']."','2','".$_POST['Email']."','".$_POST['Phone']."','".$target_file."')";
$result=$conn->query($sql);


  if(!$result){

	die("Unable to execute query");
  }
  else{


    echo"<h3 style='color:green;'> Added Admin secc </h3> ";
  }
}


$conn->close();
?>
</body>
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
