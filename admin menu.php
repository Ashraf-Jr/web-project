<html>
<head>

    <style>
    .sidenav {
    height: 35px; /* Full-height: remove this if you want "auto" height */
    width: 100%; /* Set the width of the sidebar */
    /* position: fixed; /* Fixed Sidebar (stay in place on scroll) */ */
    /* z-index: 1; /* Stay on top */ */
    top: 30; /* Stay at the top */
    left: 0;
    background-color: #263840; /* Black */
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 20px;
    /* position:fixed; */

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
    color: #FF5349;
  }
  /* Style page content */
  .main
   {
    /* margin-left: 160px; /* Same as the width of the sidebar */
    /* margin-right: 160px; /* Same as the width of the sidebar */ */ */
    padding: 0px 10px;
  }
  /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
  /* @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  } */
    </style>
    <header>
        <!-- Top header menu containing
            logo and Navigation bar -->
            <!-- Logo -->
                <div class="sidenav">
                  <center>
                    <a href="HomePage.php">  <img style="float:left;margin-left:30px"src="shopee.png" width= "90px";height="90px"; ></a>

                  <a href="HomePage.php">Home</a>
                 <a href="admin_viewClients.php">View Client Profiles</a>
                 <a href="chatAdmin.php">View Messages</a>
                 <a href="admin_products.php"> Manage Products</a>
                 <a href="admin_view_admins.php">Manage other Admins</a>
                 <a href="IndexSearch.php">Orders</a>
                 <a href="Logout.php">LogOut</a>
               </center>
                </div>
        <!-- Image menu in Header to contain an Image and
            a sample text over that image -->
        <div id="header-image-menu">
        </div>
    </header>

    </html>
