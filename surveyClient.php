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
    include_once("auditormenu.php");
  }
  
}
else
{
    include_once("menu.php");  
}


?>