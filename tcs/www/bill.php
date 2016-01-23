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

  <title>Welcome to Foundation | Store</title>


  <link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen" />
<style>
a:visited{
            color:white;
          }
 form{
        color:grey;
     }


 </style>
</head>
<body>
<div style="color:white;"><?php
      if(isset($_SESSION['Authenticated'])&&$_SESSION['Authenticated']==1)
      {
         echo "Welcome ".$_SESSION['user'];
         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php' align='right'>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='customercare.php'>Customer Service</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php'>Home</a>";
       }
  ?></div>
<?php
       if(isset($_SESSION['Authenticated'])&&$_SESSION['Authenticated']==1)
       {

           mysql_connect('localhost','root','');
           mysql_select_db('mytest');

           $billid=rand(10000,11000);
		           $checkid=mysql_query("select * from soldproducts");
		           while($row=mysql_fetch_assoc($checkid))
		           {
		              if($billid==$row['billid'])
		              {
		                  $billid=rand(1000,1100);
		                  mysql_data_seek($checkid,0);
		               }
                    }
            $result_set1=mysql_query("select * from offerstable");

            $purchdate=date("Y-m-d");
           for($i=0;$i<sizeof($_SESSION['productlist']);$i++)
           {

              $row=mysql_fetch_assoc(mysql_query('select * from mobcatalog where productid='.$_SESSION['productlist'][$i]));
              $price1=$row['price'];
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
              $itemprice=$price1*$_SESSION['quantity'][$i];
              $productid=$row['productid'];
              $productname=$row['productname'];
              $quantity=$_SESSION['quantity'][$i];
              if(isset($_POST['cdnumber'])){
              mysql_query("INSERT INTO `soldproducts`(`productid`, `billid`, `customerid`, `purchdate`, `productname`, `price`, `quantity`,`cdnumber`) VALUES ('$productid','$billid','$_SESSION[customerid]','$purchdate','$productname','$price1','$quantity]','$_POST[cdnumber]')");
              }
              else
              {
                 mysql_query("INSERT INTO `soldproducts`(`productid`, `billid`, `customerid`, `purchdate`, `productname`, `price`, `quantity`,`cdnumber`) VALUES ('$productid','$billid','$_SESSION[customerid]','$purchdate','$productname','$price1','$quantity]','0')");
               }
              $newquantity=$row['quantity']-$_SESSION['quantity'][$i];
              mysql_query("update mobcatalog set quantity=".$newquantity."where productid=".$row['productid']);
           }
  ?>
    <div style="color:white;padding:10px;margin:10px;">  Date of Purchase : <?php echo $purchdate; ?><br>
      Bill : <?php echo $billid; ?><br>
      Customer ID : <?php echo $_SESSION['customerid']; ?><br></div>
      <table>
      <tr>
      <td>Sno</td>
      <td>Product ID</td>
      <td>Product Name </td>
      <td>Warranty</td>
      <td>Quantity</td>
      <td>Price</td>
      </tr>
 <?php
      for($i=0;$i<sizeof($_SESSION['productlist']);$i++)
	  {
              $row=mysql_fetch_assoc(mysql_query("select * from mobcatalog where productid=".$_SESSION['productlist'][$i]));
   ?>

        <tr>
        <td><?php echo $i+1; ?></td>
        <td><?php echo $_SESSION['productlist'][$i]; ?></td>
        <td><?php echo $row['productname']; ?></td>
        <td><?php echo $row['warranty']; ?></td>
        <td><?php echo $_SESSION['quantity'][$i]; ?></td>
        <td><?php echo $row['price']; ?></td>
        </tr>
     <?php
        }
     ?>
     <span style="color:white;size:1.5em">Total Price :<?php echo $_POST['totalprice']; ?></span>
     <br><br>
     <?php
     }
           $_SESSION['productlist']=array();
           $_SESSION['cartcount']=0;
           $_SESSION['quantity']=array();
       ?>
     <a href="#" onclick="window.print();">Print</a>

   </body>
  </html>




