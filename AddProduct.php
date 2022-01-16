<?php
session_start();

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

echo "<form action='ADDProduct.php' method='post'>";
echo "Product Name: <input type= 'text'  name= 'ProductName' ><br>";
echo "Category: <input type= 'text'  name= 'Category' ><br>";
echo "Price: <input type= 'text'  name= 'Price' ><br>";
echo "Amount: <input type= 'text'  name= 'Amount' ><br>";
echo "Description: <input type= 'text'  name= 'Description' ><br>";
echo "Fabric: <input type= 'text'  name= 'Fabric' ><br>";
echo "Average Rate: <input type= 'text'  name= 'AverageRate' ><br>";
echo "Stock: <input type= 'text'  name= 'Stock' ><br>";
echo "<input type= 'submit'  name= 'submit'  value= 'Submit' ><br>";
echo"</form>";



if(isset($_POST['submit'])){



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
}


$conn->close();
?>