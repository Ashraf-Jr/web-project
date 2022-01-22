<html>
<!-- <link rel="stylesheet" type="text/css" href="signin.css" media="screen" />
 -->
<head>
  <?php
 if(!empty($_SESSION['ID']))
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
    include_once("auditormenu.php");
  }

}
else
{
    include_once("menu.php");
}
   ?>
  <style>


input[type=text],input[type=password], select,input[type='number'] {
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


/* input[type=text]:focus {
  border: 3px solid #555555;
}
input[type=text]
{
  padding:5px;
  margin:10px 0; // add top and bottom margin
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #ededed;
  border: none;
  color: black;
  padding: 2px 12px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
} */
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
h2
{
 color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 27px; letter-spacing: -1px; line-height: 1; text-align: center;
}



  </style>
</head>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->


    <!-- Image menu in Header to contain an Image and
        a sample text over that image -->
    <div id="header-image-menu">

    </div>
</header>
<body>
<br><br><br>
<center><h2>SignUp<h2></center>
  <center>
</center>
<body>
<form class="form" method="post" action="" enctype="multipart/form-data">

<!-- <div  style="justify-content:center;display: flex; align-items: center;">
<div style="float:left;padding-right:10px; "> -->
  upload profile picture<br>
  <input type="file" name="profile" value=""  ><br>
  First Name<br>
  <input type="text" name="fn" value="" required> <br>
  Last Name<br>
<input type="text" name="ln" value=""required><br>

  Email<br>
  <input type="text" name="email" value="" required><br>

  Password<br>
  <input type="password" name="pass" value=""required pattern="[a-z]{6,8}"><br>
  <p style="font-weight:lighter">Password must be lowercase and 6-8 characters in length.</p>

  re-Password<br>
  <input type="password" name="repass"required ><br>

  Date<br>
  <input type="date" name="date" value=""required><br>

<!-- </div>
<div style="float:left;padding-right:10px;"> -->

Phone Number<br>
<input type="text" name="phone" value="" ><br>

Address<br>
<input type="text" name="address" value=""required><br>
Gender:<br>
male<input type="radio" name="gender" value="male" >
female<input type="radio" name="gender" value="female">
 <input type="submit" name="submit" value="submit"required>

<?php
try
{
if(isset($_POST['submit']))
{
  $target_dir="images/";
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
 if($imageFileType!="jpg" && $imageFileType !="png" && $imageFileType!="jepg" && $imageFileType!="jfif" )
{
  // echo"Sorry,only JPG , JPEG & PNG files are allowed";
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
    // echo"The file has been uploaded";
  }
  else
   {
    echo"Sorry,there was an error uploading your file";
  }
}

$conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
  echo"Failed to connect with the Database";
}
if($_POST['pass']!==$_POST['repass'])
{
   echo'Passwords are not the Same!';

}
else
{

if(isset($_POST['email']))
{
  // Remove all illegal characters from email
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

  // Validate e-mail
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
   {
      // echo("$email is a valid email address");
      echo("$email is not a valid email address");

  }
  else
   {
     if($_FILES['profile']['size'] != 0)
     {
     $query="INSERT INTO user (FirstName, LastName,Address,Password,Gender,ProfilePicture,DateOfBirth,Email,RoleType,Phone)VALUES ('".$_POST['fn']."', '".$_POST['ln']."','".$_POST['address']."','".$_POST['pass']."','".$_POST['gender']."','".$target_file."','".$_POST['date']."','".$_POST['email']."','1','".$_POST['phone']."')";
     $result=$conn->query($query);
     if(!$result)
     {
       echo"Failed to run the SQL Query".": ".$query;
     }
     else
     {
       echo"Data intered Successfully";
     }
     }
     else
      {
        $unknown="R.png";
        $query="INSERT INTO user (FirstName, LastName,Address,Password,Gender,ProfilePicture,DateOfBirth,Email,RoleType,Phone)VALUES ('".$_POST['fn']."', '".$_POST['ln']."','".$_POST['address']."','".$_POST['pass']."','".$_POST['gender']."','".$unknown."','".$_POST['date']."','".$_POST['email']."','1','".$_POST['phone']."')";
        $result=$conn->query($query);
        if(!$result)
        {
          echo"Failed to run the SQL Query".": ".$query;
        }
        else
        {
          echo"Data intered Successfully";
        }

     }
   }
     }
  }
}
}
catch (Exception $e)
{
  echo "Duplicated entry of emails :Try submiting  different email !!";
}
 ?>


</form>
</div>



</div>
</div>


<footer style="background-color:#ededed;">
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
</body>
</html>
