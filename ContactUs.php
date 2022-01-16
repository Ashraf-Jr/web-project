<?php session_start(); ?>
<html>
<!-- <link rel="stylesheet" type="text/css" href="login.css" media="screen" /> -->

<head>
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
  margin-left:500;
  margin-right: 500;
}

  .sidenav {
  height: 35px; /* Full-height: remove this if you want "auto" height */
  width: 100%; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
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


/* textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  resize: none;
} */
/* input[type=button], input[type=submit], input[type=reset] {
  background-color: #ededed;
  border: none;
  color: black;
  padding: 2px 12px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
input[type=text]
{
  padding:5px;
  margin:10px 0; // add top and bottom margin
} */
  </style>
</head>
<div id="logo" >
  <header>

      <!-- Top header menu containing
          logo and Navigation bar -->
      <div id="top-header">

          <!-- Logo -->
          <div id="logo">
            <a href="HomePage.php">  <img src="Tectoy_simple_logo.png" width= "50px";height="50px"; ></a>
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
      <div id="header-image-menu">

      </div>
  </header>
  <br><br><br>

</div>
<center>
  <div class="form">
<h1>Request your desired products</h1>
<p>Email us with any question or inquiries or cal +01016633884, We would be happy to answer
  your questions and set up a meeting with you.Black Sheep Web Design can help you apart from the flock!</p>
</center>
<div style="justify-content:center;display:flex">
<form method="post" action="" enctype="multipart/form-data">
   Product Name:<br>
  <input type="text" name="ProductName" required><br>
  Product Picture:<br>
  <input type="file" name="productPic" required><br>
  Product link:<br>
  <input type="text" name="link" required><br>

  <input type="submit" name="submit">
</form>
</div>

<?php



$conn=mysqli_connect("localhost","root","","market place");
if(!$conn)
{
  echo "Failed to connect with the Database";
}
if(isset($_POST['submit']))
{



  $target_dir="requested/";
  $target_file=$target_dir.basename($_FILES["productPic"]["name"]);
  $uploadOK=1;
  $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if($imageFileType!="jpg" && $imageFileType !="png" && $imageFileType!="jepg" && $imageFileType!="jfif")
  {
  echo"Sorry,only JPG , JPEG & PNG files are allowed";
  $uploadOK=0;
  }
  if($uploadOK==0)
  {
  echo"Sorry,your file was not uploaded!<br>";
  }
  else
  {
  if(move_uploaded_file($_FILES["productPic"]["tmp_name"],$target_file))
  {
  echo"The file has been uploaded";
  }
  else
  {
  echo"Sorry,there was an error uploading your file";
  }
  }


  filter_var($_POST['link'], FILTER_SANITIZE_URL);

  if (filter_var($_POST['link'], FILTER_VALIDATE_URL))
  {
     $insert="INSERT INTO requested_products (UserID,ProductName,Picture , ProductLink) VALUES (".$_SESSION['ID'].",'".$_POST['ProductName']."', '".$target_file."','" .$_POST['link']."') ";
      //echo "<br>".$insert;
     $result=$conn->query($insert);
     if($result)
     {
       echo"we'll get back with you as soon as possible";
     }
     else
     {
       echo"Sorry,something went wrong try again ";
     }


  }
  else
 {
     echo $_POST['link']."  is <strong>NOT</strong> a valid URL.<br/><br/>";
 }

}

 ?>


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
</html>
