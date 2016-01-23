<?php
   $productselected=$_POST['userSelected'];

   mysql_connect("localhost","root","");
   mysql_select_db("mytest");
   //code to get details and populate
   $query="select * from mobcatalog where productid=".$productselected;
   $query1="select * from features where productid=".$productselected;
   $result_set=mysql_query($query);
   $row=mysql_fetch_assoc($result_set);
   $result_set1=mysql_query($query1);
   $row1=mysql_fetch_assoc($result_set1);



  echo "<div class='large-12 columns'>"."<div class='panel'>"."<div class='row'>"."<div class='large-2 small-6 columns'>"."<img src=".$row['ipath'].">
                     </div>
                     <div class='large-10 small-6 columns'>
                      <strong>".$row['productname']."<hr/></strong>
                      <h5>Rs.".$row['price']."</h5>
                      OS : ".$row1['os']."<br>Processor :  ".$row1['processor']."<br>Connectivity :  ".$row1['connectivity']."<br>Camera :  ".$row1['camera']."
                  </div>


                  </div>
               <img src='image/close.jpg' onclick='hideframe()'><img src='image/addtocart.jpg' onclick='addtocart(".$productselected.")' align=right><br><form name='quantityform'>Quantity :<input type='text' size='1' value='1' name='quantity'></form></div>
            </div>";

?>