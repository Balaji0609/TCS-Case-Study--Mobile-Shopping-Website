<?php
   session_start();
     mysql_connect("localhost","root","");
     mysql_select_db("mytest");
     $result_set=mysql_query("select * from userstable");
     while($row=mysql_fetch_assoc($result_set))
     {
     if(isset($_POST["username"])&&($_POST["username"]==$row['username'])&&isset($_POST["password"])&&($_POST["password"]==$row['password']))
      {
        $_SESSION["Authenticated"]=1;
        $_SESSION["user"]=$_POST["username"];
        $_SESSION['customerid']=$row['customerid'];

       }

      }
      if(!isset($_SESSION["Authenticated"]))
      {
         echo "Invalid Password or Email ID.Please Try Again";
         echo "<br><a href='index.php'>Home</a>";
       }
      else
      {
       session_write_close();
       header("Location:customercare.php");
      }
?>