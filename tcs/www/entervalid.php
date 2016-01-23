<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("mytest");
$customerid=rand(2000,9999);
$result_set=mysql_query("select * from userstable");
while($row=mysql_fetch_assoc($result_set))
{
   if(in_array($customerid,$row))
   {
      $customerid=rand(2000,9999);
      mysql_data_seek($result_set,0);
    }
 }
mysql_query("INSERT INTO `userstable`(`username`, `customerid`, `password`, `email`, `phonenumber`) VALUES ('$_POST[usrname]','$customerid','$_POST[passwd]','$_POST[eid]','$_POST[pno]')");
header("Location:index.php");
?>
