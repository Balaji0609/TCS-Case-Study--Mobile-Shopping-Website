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


  <link rel="stylesheet" href="css/foundation.css">

<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen" />
<script language="javascript" src='js/functions.js'>

</script>
<style type="text/css">
#fillform{
          color:white;
          }
          textarea{
            vertical-align:middle;
        }
 form {
     width: 80%;
     margin: 0 auto;
 }

 label, input {
     display: inline-block;
 }

 label {
     width: 30%;
     text-align: right;
 }

 label + input {
     width: 30%;
     margin: 0 30% 0 4%;
 }

 input + input {
     float: right;
}
h2{
      color:green;
}
   #service{
                       margin:40px;
                       padding:40px;
                       font-size:18px;
                       font-color:cyan;
                   }
#service a:hover{
                                     font-size:22px;
                                     color:orange;
                      }
</style>
</head>
<body>
<?php include("menu.php"); ?>
<?php

     $_SESSION['Authenticated']=1;
     if(isset($_SESSION["Authenticated"])&&($_SESSION["Authenticated"]==1)){
 ?>
    <h2>Welcome to customer care </h2>
    <div id="service"><a href="logout.php">Logout</a><br>
    <a href="#" onclick="servicemess(0)">Request Service</a><br>
    <a href="#" onclick="servicemess(1)">Track Status of Previous Service</a><br><div id="fillform" style="border:5px solid white">&nbsp;</div></div>

 <?php
    }
    else{
  ?>
  <h2>Invalid Email ID or Password.</h2>
  <a href="index.php">login</a>
  <?php
  }
  ?>
  </body>
  </html>