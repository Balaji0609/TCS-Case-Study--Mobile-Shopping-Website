
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
<style type="text/css">
#displayer{
      visibility:hidden;
      position:fixed;
      min-height:500px;
      width:80%;
      left:10%;
      top:20%;
    }

a:visited{
            color:white;
          }
 form{
        color:grey;
     }


</style>
<script language="javascript" type="text/javascript" src='js/functions.js'>

</script>
</head>
<body  >

<?php include("menu.php"); ?>
<div class="row">
    <div class="large-12 columns">


      <div class="row">

  <!-- filter -->

      <!--  <div class="large-4 columns" style="position:fixed;left:10%;width:25%">

          <img src="image/1.jpg">

          <div class="hide-for-small panel">
            <h3>Header</h3>
            <h5 class="subheader">FILTER           </h5>
          </div>



        </div>-->

    <!-- filter -->
    <div class="large-8 columns">
	          <div class="row">

   <?php
        mysql_connect("localhost","root","");
	    mysql_select_db("mytest");

        $result_set=mysql_query("select * from mobcatalog where type='mobile'");


    while($row=mysql_fetch_assoc($result_set))
    {

    ?>
	            <div class="large-4 small-6 columns">
	             <?php echo "<img src=".$row['ipath']." onclick='showframe(".$row['productid'].")'>"; ?>

	              <div class="panel">
	                <h5><?php echo $row['productname']; ?></h5>
	                <h6 class="subheader"><?php echo $row['brandname']; ?></h6>
	                <h6 class="subheader"><?php echo $row['price']; ?></h6>
	              </div>
	            </div>
<?php
   }
  ?>






          <a href="checkout.php">
		  				            <div class="panel callout radius" style="position:fixed;bottom:0%;right:0%" >
		  				              <h6><span id="cartcount"></span></h6>
		  				            </div>
          </a>
          <div class="panel callout radius" style="position:fixed;bottom:0%;left:0%" onclick="clearcart()">
		  		  				              <h6>Clear Cart !</h6>

		  				            </div>
        </div>
      </div>


    </div>
  </div>
</div>

<div class="row" id="displayer">



          </div>


</body>
</html>
