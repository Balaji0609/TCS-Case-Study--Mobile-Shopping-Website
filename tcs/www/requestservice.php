<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Foundation | Store</title>

<?php
      session_start();
 ?>
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
<?php include("menu.php"); ?>
<?php
     mysql_connect("localhost","root","");
     mysql_select_db("mytest");
     if(isset($_POST['newservice']))
     {
        $price=mysql_query("select * from mobcatalog where productid=".$_POST['pid']);
        $purchdate=mysql_query("select purchdate from soldproducts where productid=".$_POST['pid']." and customerid=".$_SESSION['customerid']);
        $row1=mysql_fetch_assoc($price);
        if($daterow=mysql_fetch_assoc($purchdate))
        {
        $price=0.05*$row1['price'];
        $newdate=date('Y-m-d');
        $newdate1 = strtotime($newdate);
        $purchasedate=strtotime($daterow['purchdate']);
        $warrdate=$purchasedate+($row1['warranty']*365*3600*24);
        if(($newdate1-$purchasedate)<=($warrdate-$purchasedate))
        {
           $price=0;
        }
        $duedate=date('Y-m-d', strtotime($newdate. ' + 30 days'));
        $serviceid=rand(1000,1100);
        $checkid=mysql_query("select * from servicetable");
        while($row=mysql_fetch_assoc($checkid))
        {
           if($serviceid==$row['serviceid'])
           {
               $serviceid=rand(1000,1100);
               mysql_data_seek($checkid,0);
            }
         }
         $query="INSERT INTO `servicetable`(`productid`, `serviceid`, `customerid`, `servicedate`, `customername`, `address`, `productname`, `warranty`, `defect`, `duedate`, `servicecharge`) VALUES ('$_POST[pid]',$serviceid,'$_SESSION[customerid]','$newdate','$_POST[customername]','$_POST[address]','$_POST[pname]','$row1[warranty]','$_POST[defect]','$duedate',$price)";
         mysql_query($query);
   ?>
        <div style="color:white">Date : <?php echo $newdate; ?>
        Service ID : <?php echo $serviceid; ?><br>
        Customer Name :<?php echo $_POST['customername']; ?><br>
        Address :<?php echo $_POST['address']; ?><br>
        Product Name : <?php echo $_POST['pname']; ?><br>
        Defect : <?php echo $_POST['defect']; ?><br>
        DueDate : <?php echo $duedate; ?><br>
        Service Charge : <?php echo $price; ?><br></div>
        <?php
        }else
        {
           echo "<h2 style='color:white'>You Havent bought the product</h2>";
         }
         }

       else if(isset($_POST['statusservice'])){
         $currdate=date('Y-m-d');
         $details=mysql_query("select * from servicetable where serviceid=".$_POST['serviceid']);
         if($row=mysql_fetch_assoc($details)){
        ?>
       <div style="color:white"> Service ID : <?php echo $row['serviceid']; ?><br>
        Customer Name : <?php echo $row['customername']; ?><br>
        Product ID :<?php echo $row['productid']; ?><br>
        Product Name : <?php echo $row['productname']; ?><br>
        Warranty : <?php echo $row['warranty']; ?><br>
        Defect : <?php echo $row['defect']; ?><br>
        Due Date : <?php echo $row['duedate']; ?><br>
        Service Charge : <?php echo $row['servicecharge']; ?><br></div>
        <?php
        }else
        {
          echo "<h2 style='color:white'>No such service acquired</h2>";
         }
        }
        ?>

</body>
</html>


