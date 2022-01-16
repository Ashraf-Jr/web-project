  <?php
  $conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
  echo"Failed to connect with the SQLiteDatabase";
}
else
{
  mysql_query("INSERT INTO `products`(`review`) VALUES ('$_POST[review]')");
}

?>