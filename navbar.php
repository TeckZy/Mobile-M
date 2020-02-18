
 <?php
            
            if(!isset($_SESSION["LoginID"]))
            {     
            ?>

<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav top-nav-info">
						
							<li><a href="index.php" class="active">Home</a></li>
							<li role="presentation"><a href="about.php">About Us</a></li>
							<li role="presentation"><a href="products.php"> Products</a></li>
							<li role="presentation"><a href="UploadAd.php"> Post a Ad</a></li>
                             <li> <a href="AllAds.php"> Old Products</a> </li>							
                       
							
						</ul> 
						<div class="clearfix"> </div>
						<!--//navbar-collsapse-->
						<header class="cd-main-header" style="margin-left:300px;">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"><span></span></a></li>
							</ul> <!-- cd-header-buttons -->
						</header>
					</div>
					<!--//navbar-header-->
				</nav>
				
				
		<?php
            }
            else
            {
                ?>	
<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav top-nav-info">
						
							<li><a href="index.php" class="active">Home</a></li>
							<li role="presentation"><a href="about.php">About Us</a></li>
							<li role="presentation"><a href="products.php"> Products</a></li>
							<li role="presentation"><a href="UploadAd.php"> Post a Ad</a>
							</li>	
							 <li> <a href="AllAds.php"> Old Products</a> </li>
           
						<li role="presentation" class="dropdown">
                          <a href="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            My Account
                            <span class="caret"></span>
                          </a>
                          <ul id="menu1" class="dropdown-menu" aria-labelledby="dropdownMenu1">
						  <li><br/></li>
						  <li><br/></li>
						 
                            <li><a href="MyProfile.php">My Profile</a></li>
                           <!--- <li> <a href="#">My Orders</a></li> ------>
                            <li><a href="MyAds.php">My Ads</a></li>
                            <li><a href="ChangePassword.php">Change Password</a></li>
                           <li style="float:left;">
							<a href="manage/manage.customerlogout.php">Logout</a> 
							<img class="img-responsive M1" src="images/slider/Slider1.jpg" style="height:180px; width:70%; margin-left:300px; margin-top:-150px;"/>
							<br/>
							<br/>
							</li>							
                          </ul>
						
                        </li>
						</ul> 
						<div class="clearfix"> </div>
						<!--//navbar-collapse-->
						<header class="cd-main-header" style="margin-left:250px;">
							<ul class="cd-header-buttons">
								<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
							</ul> <!-- cd-header-buttons -->
						</header>
					</div>
					<!--//navbar-header-->
				</nav>				
		<?php 

			}
		?>		