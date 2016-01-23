<?php
   session_start();
   if(isset($_SESSION['Authenticated'])&&$_SESSION['Authenticated']==1)
   {
      mysql_connect("localhost","root","");
      mysql_select_db("mytest");
      $result_set=mysql_query("select quantity,productname from mobcatalog where productid=".$_POST['addcart']);
      $row=mysql_fetch_assoc($result_set);
      if(!in_array($_POST['addcart'],$_SESSION['productlist']))
      {
        if($row['quantity'] >= $_POST['quantity'])
        {
         array_push($_SESSION['productlist'],$_POST['addcart']);
         array_push($_SESSION['quantity'],$_POST['quantity']);
         $_SESSION['cartcount']=$_SESSION['cartcount']+$_POST['quantity'];
         echo $_SESSION['cartcount']."&nbsp; items in your cart";
         }
         else
         {
            echo $_POST['quantity']." ".$row['productname']." not avalaible ";
         }


   }
   }
   else
   {
       echo "Please Login<br>";
    }
 ?>