<?php

session_start();

$conn = new mysqli ("localhost", "root", "", "market place") ;

if ($conn->connect_error)
die ("fatal error - cannot connect to the DB");

$sql="DELETE from user  where UserID ='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);
if(!$result)
{
		die("Unable to execute query");

}
else
{
    echo"<h3 style='color:green;'> Deleted Admin secc </h3> ";
}
		
?>