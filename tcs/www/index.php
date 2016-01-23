
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
      session_start();

      $_SESSION['cartcount']=0;
      $_SESSION['productlist']=array();
      $_SESSION['quantity']=array();

  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen" />

<title>Mega Drop Down Menu</title>
<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px;
</style>
<![endif]-->
<script language="javascript" type="text/javascript" src='js/functions.js'>

</script>
<style>
a:visited{
            color:white;
          }
 form{
        color:grey;
     }

 </style>
</head>

<body onload="ajaxFunction();">

<?php include("menu.php"); ?>
<div id="offerslideshow" >
<a href="store1.php"><img id="imagedisplay" src=''></img></a>

</div>





</body>

</html>