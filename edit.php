<?php session_start();?>
<html>
<head>
  <style>
  .bg {
          background-image: url("https://images.unsplash.com/photo-1523381294911-8d3cead13475?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9");
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }

          .sidenav {
          height: 35px; /* Full-height: remove this if you want "auto" height */
          width: 100%; /* Set the width of the sidebar */
          z-index: 1; /* Stay on top */
          top: 30; /* Stay at the top */
          left: 0;
          background-color: #111; /* Black */
          overflow-x: hidden; /* Disable horizontal scroll */
          padding-top: 20px;
        }

        /* The navigation menu links */
        .sidenav a {
          padding: 6px 8px 6px 16px;
          text-decoration: none;
          font-size: 15px;
          color: #818181;
          display: inline;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
          color: #f1f1f1;
        }

        /* Style page content */
        .main {
          margin-left: 160px; /* Same as the width of the sidebar */
          padding: 0px 10px;
        }
        li
        {


        }
  </style>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->

        <!-- Logo -->

            <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; >
            <div class="sidenav">
              <center>
              <a href="HomePage.php">Home</a>
             <a href="AboutUs.php">About Us</a>
             <a href="OurProducts.php">Our Products</a>
             <a href="#">Careers</a>
             <a href="ContactUs.php">Contact Us</a>
             <a href="SignUp.php">SignUp</a>
             <a href="LoginPage.php">Login</a>
           </center>
            </div>

    <!-- Image menu in Header to contain an Image and
        a sample text over that image -->

</header>

</head>
<?php
 echo"<img src='".$_SESSION['Profile']."' alt='profile pricture width='100' height='100'>";
 echo $_SESSION['Profile'];
 ?>


<form method="post" action="" enctype="multipart/form-data">
  Upload Profile Picture<br>
  <input type="file" name="profile" value=""><br>
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

 <?php
 $conn=mysqli_connect("localhost","root","","market place");
 if(!$conn)
 {
   echo "Failed to connect with the DataBase";
 }
 else if(isset($_POST['submit']))
 {
if(!empty($_POST['profile']))
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
   else if($uploadOK==0)
   {
   echo"Sorry,your file was not uploaded!";
   }
   else if($uploadOK!=0)
   {
     if(move_uploaded_file($_FILES["profile"]["tmp_name"],$target_file))
     {
     echo"The file has been uploaded";
     echo $target_file."hereeeee";
     }
     else
     {
     echo"Sorry,there was an error uploading your file";
     }
   }
    $query="UPDATE user SET FirstName = \"".$_POST['fname']."\", LastName = \"".$_POST['lname']."\", Email = \"".$_POST['email']."\",Phone=\"".$_POST['phone']."\",ProfilePicture=\"".$target_file."\" WHERE UserID=\"".$_SESSION['ID']."\"";
    
    echo $query;

}
else{
  $query="UPDATE user SET FirstName = \"".$_POST['fname']."\", LastName = \"".$_POST['lname']."\", Email = \"".$_POST['email']."\",Phone=\"".$_POST['phone']."\" WHERE UserID=\"".$_SESSION['ID']."\"";}


 $result=$conn->query($query);
 if(!$result)
 {
   echo"Coud no run the SQL Query";
 }
 else
 {
   echo"Data submited Successfully";
   //header( "Location: Profile.php" );

 }

 $retrive="select * from user  WHERE UserID=\"".$_SESSION['ID']."\"";
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
   }
 }
 else {
   echo "something went wrong";
 }
 }
 ?>



<footer style="background-color:#ededed;position:absolute;bottom:0px;width:100%">
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
