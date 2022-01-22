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

input[type=text],input[type=password],input[type=number], select {
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
</style>
<body>


<?php

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

echo "<form class='form' action='ADDProduct.php' method='post' enctype='multipart/form-data'>";
echo"upload picture<br>";
echo "<input type='file' name='profile' value=''  required ><br>";
echo "Product Name: <input type= 'text'  name= 'ProductName' ><br>";
echo "Category: <input type= 'text'  name= 'Category' ><br>";
echo "Price: <input type= 'number'  name= 'Price'min='1' ><br>";
echo "Amount: <input type= 'number'  name= 'Amount' min='1'><br>";
echo "Description: <input type= 'text'  name= 'Description' ><br>";
echo "Fabric: <input type= 'text'  name= 'Fabric' ><br>";
echo "Average Rate: <input type= 'text'  name= 'AverageRate' ><br>";
echo "Stock: <input type= 'text'  name= 'Stock' ><br>";
echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";
echo"</form>";



if(isset($_POST['submit']))
{

  $target_dir="product images/";
  $target_file=$target_dir.basename($_FILES["profile"]["name"]);
  $uploadOK=1;
  $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//   if(file_exists($target_file))
//   {
//
//   echo"Sorry,file already exists.";
//   $uploadOK=0;
//
// }
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




$sql = "INSERT INTO products ( ProductName, Category ,Price,Amount,Description, Fabric , AverageRate , Stock)
VALUES ('".$_POST['ProductName']."','".$_POST['Category']."','".$_POST['Price']."','".$_POST['Amount']."','".$_POST['Description']."','".$_POST['Fabric']."','".$_POST['AverageRate']."','".$_POST['Stock']."')";
$result=$conn->query($sql);

echo $sql;

  if(!$result){

	die("Unable to execute query");
  }
  else{


    echo"<h3 style='color:green;'> Added secc </h3> ";
  }



$getID="select ProductID from products ";
$ProductID;
$resultID=$conn->query($getID);
if($result)
{
  while($row=$resultID->fetch_array(MYSQLI_ASSOC))
  {
    $ProductID=$row['ProductID'];
  }
}



$insertimg="INSERT INTO product_images (productID,image) VALUES ($ProductID, '".$target_file."' ) ";
$resultimg=$conn->query($insertimg);
if($resultimg)
{
  echo"suucess";
}
else {
  echo"sorry something went wrong";
}


$conn->close();
}
?>
</body>
</html>
