<?php
   session_start();
   if(isset($_SESSION['Authenticated'])&&$_SESSION['Authenticated']==1)
   {
      $_SESSION['productlist']=array();
      $_SESSION['quantity']=array();
      $_SESSION['count']=0;
      echo 1;
    }
    else
    {
      echo 0;
    }
 ?>