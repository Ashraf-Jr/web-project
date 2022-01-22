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
<head>
  <style>


        .wrapper {
          padding: 50px;
        }

        .image--cover {
          width: 200px;
          height: 200px;
          border-radius: 50%;

          object-fit: cover;
          object-position: center ;
        }

        input[type=text],input[type=password], select {
          width: 20%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }

        input[type=submit] {
          width: 20%;
          background-color: #ff4500;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #9F2B00;
        }

  </style>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->

        <!-- Logo -->


    <!-- Image menu in Header to contain an Image and
        a sample text over that image -->

</header>

</head>
<?php echo"<center><div class='wrapper'><img class='image--cover' src=\"".$_SESSION['Profile']."\" alt='profile pricture width='100' height='100'><div></center>";?>
<center>
<form method="post" action="" enctype="multipart/form-data" >
  Upload Profile Picture<br>
  <input type="file" name="profile" value="<?=$_SESSION['Profile']?>"><br>
  First Name<br>
  <input type="text" name="fname" value="<?=$_SESSION['FirstName']?>">  </br>
  Last Name<br>
  <input type="text" name="lname" value="<?=$_SESSION['LastName']?>"><br>
  Email<br>
  <input type="text" name="email" value="<?=$_SESSION['Email']?>"><br>

  Phone Number<br>
  <input type="text" name="phone" value="<?=$_SESSION['Phone']?>"><br>
  <input type="submit" name="submit">

</form>
</center>

 <?php
 $conn=mysqli_connect("localhost","root","","market place");
 if(!$conn)
 {
   echo "Failed to connect with the DataBase";
 }
 else if(isset($_POST['submit']))
 {
   if(!$_FILES['profile']['size'] == 0)
   {
   $target_dir="images/";
   $target_file=$target_dir.basename($_FILES["profile"]["name"]);
   $uploadOK=1;
   $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if($imageFileType!="jpg" && $imageFileType !="png" && $imageFileType!="jepg")
   {
   echo"Sorry,only JPG , JPEG & PNG files are allowed";
   $uploadOK=0;
   }
   if($uploadOK==0)
   {
   echo"Sorry,your file was not uploaded!";
   }
   else
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
// echo"you did input a new profile picture <br>";
// $variable=isset($_POST['profile']);
// if($_FILES['profile']['size'] == 0)
// {
//
//   echo"empetyyyyyyyyy";
// }
// echo $variable ."<br>";

  $query="UPDATE user SET FirstName = \"".$_POST['fname']."\", LastName = \"".$_POST['lname']."\",Phone=\"".$_POST['phone']."\",ProfilePicture=\"".$target_file."\", Email = \"".$_POST['email']."\" WHERE UserID=\"".$_SESSION['ID']."\"";
 $result=$conn->query($query);
 if(!$result)
 {
   echo"Coud no run the SQL Query";
 }
 else
 {
   echo"Data submited Successfully";
  // header( "Location:Profile.php" );


 }
}
else
{

  // echo"you didn't change your profile picture<br>";
  $query="UPDATE user SET FirstName = \"".$_POST['fname']."\", LastName = \"".$_POST['lname']."\",Phone=\"".$_POST['phone']."\", Email = \"".$_POST['email']."\" WHERE UserID=\"".$_SESSION['ID']."\"";
 $result=$conn->query($query);
 if(!$result)
 {
   echo"Coud no run the SQL Query";
 }
 else
 {
   echo"Data submited Successfully";
    header("Location:Profile.php");


 }

}



 $retrive="select * from user where UserID=".$_SESSION['ID'];
 $result1=$conn->query($retrive);
 if($retrive)
 {
   while($row=$result1->fetch_array(MYSQLI_ASSOC))
   {
     $_SESSION['Profile']=$row['ProfilePicture'];
     $_SESSION['FirstName']=$row['FirstName'];
     $_SESSION['LastName']=$row['LastName'];
     $_SESSION['Email']=$row['Email'];
     $_SESSION['Phone']=$row['Phone'];
     $_SESSION['ID']=$row['UserID'];
   }
 }
 else {
   echo "something went wrong";
 }
 }
 ?>


 <footer style="background-color:#ededed;width:100%;background-color:#263840;color:#818181;">
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
