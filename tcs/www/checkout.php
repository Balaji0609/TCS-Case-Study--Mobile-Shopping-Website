<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
<?php
      session_start();

 ?>
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Customercare</title>

<style>
a:visited{
            color:white;
          }
          body{
                  color:white;}
           #menu{
                 color:#222222;
             }
 form{
        color:grey;
     }

 </style>
  <link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen" />
<script type='text/javascript' src='js/functions.js'></script>





 </head>
<body>
<?php include("menu.php"); ?>

<?php

      $totalprice=0;
      if(isset($_SESSION['Authenticated'])&&($_SESSION['Authenticated']==1)&&($_SESSION['cartcount']>0))
      {
 ?>       <table>
		  <tr>
		  <td>Product ID</td>
		  <td>Mobile Name</td>
		  <td>Brand Name </td>
		  <td>Quantity</td>
		  <td>Discount</td>
		  <td>Price</td>
          </tr>
     <?php
          mysql_connect("localhost","root","");
          mysql_select_db("mytest");
          $i=0;

          $result_set1=mysql_query("select * from offerstable");

          for($i=0;$i<sizeof($_SESSION['productlist']);$i++)
          {



             $result_set=mysql_query("select * from mobcatalog where productid=".$_SESSION['productlist'][$i]);
             $row=mysql_fetch_assoc($result_set);
             $price1=$row['price'];
             $discount=0;
             while($row1=mysql_fetch_assoc($result_set1)){
             if(in_array($_SESSION['productlist'][$i],$row1))
			 {
			              $row2=mysql_fetch_assoc(mysql_query("select discount from offerstable where productid=".$_SESSION['productlist'][$i]));
			              $discount=$row2['discount'];
			              $price1=$price1-$price1*($row2['discount']/100);
			              mysql_data_seek($result_set1,0);
			              break;
             }
             }
             $totalprice=$totalprice+($_SESSION['quantity'][$i]*$price1);


      ?>
      <tr>
      <td><?php echo $row['productid']; ?></td>
      <td><?php echo $row['productname']; ?></td>
      <td><?php echo $row['brandname']; ?></td>
      <td><?php echo $_SESSION['quantity'][$i]; ?></td>
      <td><?php echo $discount; ?></td>
      <td><?php echo $_SESSION['quantity'][$i]*$row['price']; ?></td>
      </tr>
   <?php
         }


      ?>
     </table><br><span style="margin:10px;color:white;size:18px">Total Price  <?php echo $totalprice; ?></span><br>
     <form action="bill.php" method="post" name='paymentform'>
	     Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='name' name='Name'><br>
	     Address :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='address' ></textarea><br>
	     Contact Number :&nbsp;&nbsp;<input type='text' name='phonenumber'><br>
	     Mode of Payment :<br>
	     <input type='radio' name='paymode' value='Credit/DebitCard' onclick='payment()'>Credit/DebitCard<div  id='cddetails'></div><br>
	     <input type='radio' name='paymode' value='Cash On Delivery' onclick='payment()'>Cash On Delivery<br>
	     <input type='radio' name='paymode' value='Cross Cheque' onclick='payment()'>Cross Cheque<br>


		 <input type='hidden' name='totalprice' value='<?php echo $totalprice; ?>'>

	     <input type='submit' value='Submit' name='submit'>
	     <input type='reset' value='Reset' name='reset'>
    </form>


     <?php

     }else if(!isset($_SESSION['Authenticated'])||($_SESSION['Authenticated']==0)){
          echo "You are not logged in. Pls Login to purchase ";
          }
          else{
    ?>
     <h2 style="color:white;">You have no items in ur cart</h2>
     <?php
          }
       ?>
    <br>



  </body>
  </html>