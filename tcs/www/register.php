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
<script type="text/javascript">
function validate()
{
  var emm= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

   if(document.registration.passwd.value!=document.registration.cpasswd.value)
   {
      document.getElementById("passmess").innerHTML="Passwords dont match";
    }
    else if(!(document.registration.eid.value.match(emm)))
    {
       document.getElementById("invalidemail").innerHTML="Invalid Email";
     }
     else{
      document.registration.submit();
    }
 }




</script>
</head>
<body>
<?php
   include("menu.php");
 ?>
<?php
   if(!isset($_SESSION['Authenticated'])){
 ?>
<div style="color:white"><form name='registration' method='post' action='entervalid.php'  style="color:white;padding:10px;margin:10px">
UserName:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='usrname'><br>
Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='password' name='passwd'><span style="color:red" id="passmess"></span><br>
Confirm Password:<input type='password' name='cpasswd'><br>
Email ID : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='eid'><span style="color:red" id="invalidemail"></span><br>
Phone Number :&nbsp;&nbsp;&nbsp; <input type='text' name='pno'><span style="color:red" id="invalidphone"></span><br>
<input type="button" value="Register" onclick="validate()">
</form></div>
<?php
}else {
?>
<h2 style="color:white">You are already logged in </h2>
<?php
}
?>
</body>
</html>