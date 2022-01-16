<?php session_start(); ?>
<html>
<link rel="stylesheet" type="text/css" href="login.css" media="screen" />

<?php
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
    include_once("auditormenu.php");
  }
  
}
else
{
    include_once("menu.php");  
}

 ?>
<head>
  <style>


/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */

/* input[type=text]:focus {
  border: 3px solid #555555;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #ededed;
  border: none;
  color: black;
  padding: 2px 12px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
.box{
  border-style: solid;
  border-color:black;
  width:25%;
  height:60%;
} */
.wrapper {
  padding: 100px;
}

.image--cover {
  width: 150px;
  height: 150px;
  border-radius: 50%;

  object-fit: cover;
  object-position: center right;
}
h4 
{
 color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 27px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; 
}

/*p
 {
  color: #685206; font-family: 'Helvetica Neue', sans-serif; font-size: 14px; line-height: 24px; margin: 0 0 24px; text-align: justify; text-justify: inter-word;
   }*/



  </style>
</head>
<header>

    <!-- Top header menu containing
        logo and Navigation bar -->

        <?php
        if(isset($_POST['submit']))
        {
        $conn=mysqli_connect("localhost","root","","market place");
        if(!$conn)
        {
          echo"Failed to connect with the DataBase";
        }
        $query="select * from user where Email=\"".$_POST['email']."\" and Password=\"".$_POST['pass']."\"";
        $result=$conn->query($query);
        if(!$result)
        {
          echo"Failed to run the SQL Query"." ".$query;
        }
        if($row=$result->fetch_array(MYSQLI_ASSOC))
        {
          $_SESSION["ID"]=$row['UserID'];
          $_SESSION["FirstName"]=$row['FirstName'];
          $_SESSION["LastName"]=$row['LastName'];
          $_SESSION["Email"]=$row['Email'];
          $_SESSION["Password"]=$row['Password'];
          $_SESSION["Phone"]=$row['Phone'];
          $_SESSION["Address"]=$row['Address'];
          $_SESSION["Date"]=$row['DateOfBirth'];
          $_SESSION["Gender"]=$row['Gender'];
          $_SESSION["Profile"]=$row['ProfilePicture'];
          $_SESSION['Role']=$row['RoleType'];
        //header("Location:HomePage.php");
        }
        else {
          echo"Invalid email or Password!<br>";
          echo"try again";
        }

        }

//echo $_SESSION['Profile'];
         ?>


    <!-- Image menu in Header to contain an Image and
        a sample text over that image -->
    <div id="header-image-menu">

    </div>
</header>
<br><br><br>

<center>
<h4> User Login</h4>
</center>
<center>
  <div class="box">
  <?php 
  if(isset($_SESSION['Profile']))
  {
    echo"  <div class='wrapper'><img class='image--cover' src='".$_SESSION['Profile']."' alt='profile picture' width='100'height='100'></div>";

  }

  ?>
  <p style="width:40%">Welcome back! Log in to your account to view today's clients:</p>

  <form method="post" action="">

<!-- <img src="R.png" alt="user" width="6%" height="6%"> -->
<label for="Email">Email</label>
  <input type="text" name="email" value=""><br>
  <!-- <img src="OIP (1).jfif" alt="lock"width="6%"height="6%"> -->
  <label for="Password">Password</label>

    <input type="password" name="pass" value=""><br><br>

    <!-- <img src="OIP (2).jfif" alt="login"width="4%" height="3%"> -->
      <input type="submit" name="submit" value="login">

    </form>
      <p>Forgot password?<a href=# > link</a></p>
      create account <a href="SignUp.php">signUp</a>
</center>

</div>


<!-- <footer style="background-color:#ededed;bottom:0px;position:absolute;width:98%">
  <br>
  Join The Community

<p>Author: Hege Refsnes</p>
<p><a href="mailto:maraime@example.com">hege@example.com</a></p>
follow us : facebook <br>

</footer> -->
</html>
