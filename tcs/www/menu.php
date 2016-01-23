<div style="color:white;"><?php
      if(isset($_SESSION['Authenticated'])&&$_SESSION['Authenticated']==1)
      {
         echo "Welcome ".$_SESSION['user'];
         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php' align='right'>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='customercare.php'>Customer Service</a>";
       }
  ?></div>
<div>
<ul id="menu">

    <li><a href="index.php" class="drop">Home</a><!-- Begin Home Item -->

        <div class="dropdown_2columns"><!-- Begin 2 columns container -->

            <div class="col_2">
                <h2>Welcome !</h2>
            </div>

            <div class="col_2">
                <p>Hi and welcome here ! This is a showroom of the best mobile phones available in the market.</p>
                <p>We provide both mobile phones and accessories sales and service.</p>
                <p><sub>*Website best viewed in Google Chrome</sub></p>
            </div>

            <div class="col_2">
                <h2>Login</h2>
            </div>

            <div class="col_2">
                <form name="loginform" style="display:inline" method="post" action="login.php">
				User Name :<input type="text" name="username"><br>
				Password &nbsp;  :<input type="password" name="password"><br>
				<input type="hidden" name="login" value="login">
				<input name="submit" type="submit" value="Login">
</form><form style="display:inline" action="register.php"><input name="register" type="submit" value="Register"> </form>
            </div>



        </div><!-- End 2 columns container -->

    </li><!-- End Home Item -->

    <li>Products<!-- Begin products columns Item -->

         <div class="dropdown_3columns"><!-- Begin 3 columns container -->



            <div class="col_3">
                <h2>Our Products</h2>
            </div>

            <div class="col_3">
                <a href="store1.php"><img src="image/mobile.jpg" width="70" height="70" class="img_left imgshadow" alt="" /></a>
                <p>Browse through the wide array of Mobile Phones we provide.</p><br><br><br>

                <a href="store2.php"><img src="image/access.jpg" width="70" height="70" class="img_left imgshadow" alt="" /></a>
                <p>Select from a wide variety of accessories to personalize your Mobile Phone</p>

            </div>

        </div><!-- End 5 columns container -->

    </li><!-- End 5 columns Item -->




</ul>
</div>
<div style="height:100px;width:100%">
</div>