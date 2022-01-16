<?php 
//include "menu.php";

session_start();
/*$_POST["ProductID"]=$ProductID;
$_POST["ProductName"]=$ProductName;
$_POST["Category"]=$Category;
$_POST["Price"]=$Price;
$_POST["Amount"]=$Amount;
$_POST["Description"]=$Description;
$_POST["Fabric"]=$Fabric;
$_POST["AverageRate"]=$AverageRate;
$_POST["Stock"]=$Stock;*/

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

if(!isset($_GET['submit'])){
	$ProductID=$_GET['id'];

$select="select * from Products where ProductID=".$_GET['id'];
$result1=$conn->query($select);
if($row = $result1->fetch_array(MYSQLI_ASSOC)){
	echo "<form action='' method='get'>";
 echo "Product ID: <input type= 'hidden'  name= 'ProductID'  value='".$row['ProductID']."'><br>";
echo "Product Name: <input type= 'text'  name= 'ProductName' value=".$row['ProductName']."><br>";
echo "Category: <input type= 'text'  name= 'Category' value=".$row['Category']."><br>";
echo "Price: <input type= 'text'  name= 'Price' value=".$row['Price']."><br>";
echo "Amount: <input type= 'text'  name= 'Amount' value=".$row['Amount']."><br>";
echo "Description: <input type= 'text'  name= 'Description' value=".$row['Description']."><br>";
echo "Fabric: <input type= 'text'  name= 'Fabric' value=".$row['Fabric']."><br>";
echo "Average Rate: <input type= 'text'  name= 'AverageRate' value=".$row['AverageRate']."><br>";
echo "Stock: <input type= 'text'  name= 'Stock' value=".$row['Stock']."><br>";
echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";
}
}
echo"</form>";

if(isset($_GET['submit'])){
$sql="update products set ProductID='".$_GET['ProductID']."', ProductName='".$_GET['ProductName']."', Category='".$_GET['Category']."', Price='".$_GET['Price']."', Amount='".$_GET['Amount']."', Description='".$_GET['Description']."', Fabric='".$_GET['Fabric']."', AverageRate='".$_GET['AverageRate']."', Stock='".$_GET['Stock']."'  where ProductID = '".$_GET['ProductID']."'";

$result=mysqli_query($conn,$sql);
if(!$result){

	die("Unable to execute query");
}
else{
echo"<h3 style='color:green;'> Updated </h3> ";
}

}

?>