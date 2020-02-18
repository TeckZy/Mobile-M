<div style="margin-bottom:60px;" class="navbar-fixed">
	<nav class="nav-extended cyan darken-4">
		<button href="#" data-target="main-slide-out" class="waves-effect waves-light btn sidenav-trigger"><i class="fa fa-bars"></i></button>

		<div class="nav-wrapper">

			<a href="#!" class="brand-logo"><svg fill="url(#grad1)" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="200px" height="120px" viewBox="0 0 949.434 949.434" style="enable-background:new 0 0 949.434 949.434;" xml:space="preserve">
						<defs>
							<linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
								<stop offset="0%" style="stop-color:white" />
								<stop offset="0%" style="stop-color:orange" />
								<stop offset="100%" style="stop-color:red" />
							</linearGradient>
						</defs>
						<g>
							<g>
								<path d="M949.434,224.27l-587.341,0.225l8.312-93.217H200.27v65h49.888h49.192l-2.699,30.287l-14.007,157.11H0v65h276.85
			l-4.283,48.044H143.529v65h123.243l-2.67,29.946h553.891L949.434,224.27z M335.155,526.666l6.953-77.99h53.195v-65h-47.4
			l8.396-94.179l500.834-0.191l-84.919,237.36H335.155z" />
								<path d="M626.999,786.956c16.736,19.827,42.046,31.199,69.442,31.199c53.688,0,102.879-41.885,111.985-95.355
			c4.705-27.622-2.319-54.983-19.272-75.068c-16.736-19.827-42.046-31.199-69.442-31.199h-374.45
			c-53.688,0-102.879,41.885-111.986,95.354c-4.705,27.623,2.32,54.985,19.273,75.07c16.736,19.827,42.046,31.199,69.441,31.199
			c53.688,0,102.878-41.885,111.985-95.355c2.408-14.139,1.736-28.207-1.761-41.269h185.457c-4.72,9.498-8.132,19.695-9.948,30.354
			C603.021,739.509,610.045,766.87,626.999,786.956z M365.033,689.656c4.643,5.501,6.372,13.396,4.867,22.229
			c-3.745,21.984-26.133,41.271-47.909,41.271c-8.447,0-15.284-2.811-19.771-8.125c-4.644-5.501-6.372-13.396-4.867-22.23
			c3.745-21.983,26.133-41.269,47.909-41.269C353.709,681.531,360.546,684.341,365.033,689.656z M739.483,689.656
			c4.643,5.501,6.372,13.396,4.866,22.229c-3.744,21.984-26.132,41.271-47.908,41.271c-8.448,0-15.284-2.811-19.771-8.125
			c-4.644-5.501-6.372-13.396-4.867-22.23c3.745-21.983,26.132-41.269,47.909-41.269
			C728.159,681.531,734.996,684.341,739.483,689.656z" />
								<rect x="78.951" y="274.902" width="174.728" height="65" />
							</g>
						</g>
						
					</svg></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="index.php" class="active">Home</a></li>
				<li role="presentation"><a href="about.php">About Us</a></li>
				<li role="presentation"><a href="products.php"> Products</a></li>
				<li role="presentation"><a href="UploadAd.php"> Post an Ad</a></li>
				<li> <a href="AllAds.php"> Old Products</a> </li>
				<li><a class="waves-effect waves-light btn modal-trigger" href="#trackmyOrder_Modal">Track My Order</a></li>

				<?php 
				error_reporting(0);
				if (isset($_SESSION["LoginID"])) {
					$name = $_SESSION["LoginID"];
					$s = "select * from registration where Email='$name'";
					$q = mysqli_query($conn, $s) or die('Error');
					$row = mysqli_fetch_array($q, MYSQLI_BOTH);
				?>
					<li><a class='dropdown-trigger btn' href='#' data-target='nameDrop'><?php echo $row[1]; ?></a></li>
					
					<ul id='nameDrop' class='dropdown-content'>
						<li><a href="MyProfile.php">My Profile</a></li>
						<!--- <li> <a href="#">My Orders</a></li> ------>
						<li><a href="MyAds.php">My Ads</a></li>
						<li><a href="ChangePassword.php">Change Password</a></li>
						<li class="divider" tabindex="-1"></li>
						<li><a href="manage/manage.customerlogout.php">Logout</a></li>
					</ul>
					
				<?php } else { ?>
					<li><a class="waves-effect waves-light btn modal-trigger" data-target="loginRegModal">Register/Sign-In </a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="nav-content">
		<div class="row">
			<div class="col s4"></div>
          <div class="input-field col s8">
            <i class="fa fa-search prefix"></i>
            <input type="text" id="autocomplete-input" class="autocomplete">
            <label for="autocomplete-input">Mobiles,Laptop,Shoes etc...</label>
          </div>
        </div>
    </div>
	</nav>
	<div class="divider"></div>
</div>




<!-- Content -->
<!-- <div class="parallax-container center valign-wrapper">
	
	<div class="container">
		<div class="row">

			<div class="col s12 white-text center">
				
				<h1 class="teal-text teal-text lighten-2">MobiKart</h1>
				<p>A modern responsive front-end framework based on Material Design</p>
				<a class="waves-effect waves-light btn-large teal lighten-2">Get Started</a>
			</div>
		</div>
	</div>

	
</div> -->


<!-- CART FAB -->
<div class="fixed-action-btn">
	<?php
	include("manage/manage.database.php");
	$cartcount = 0;
	$email = "";
	if (isset($_SESSION["LoginID"])) {
		$email = $_SESSION["LoginID"];
	}
	$systemid = "";
	if (isset($_SESSION["SystemID"])) {
		$systemid = $_SESSION["SystemID"];
	}
	$sqlcart = "select count(*) from cart where (Email='$email' or SystemID='$systemid') and BuyStatus='false'";
	$rescart = mysqli_query($conn, $sqlcart);
	$rowcart = mysqli_fetch_array($rescart, MYSQLI_BOTH);
	$cartcount = $rowcart['0'];

	?>
	<a href="checkout.php" class="<?php if ($cartcount > 0) {
										echo "pulse";
									}; ?> btn-floating btn-large halfway-fab waves-effect waves-light teal">
		<span><i class="fa fa-shopping-cart"></i><i class="notif"><?php echo $cartcount; ?></i></span>
	</a>
</div>


<!-- Side Navigation -->
<ul id="main-slide-out" class="sidenav">
	<li>
		<div class="user-view">
			<div class="navBG background">
				<img class="responsive-img" src="images/Mobilem.png">
			</div>
			<?php 
			if (isset($_SESSION["LoginID"])) {
				$name = $_SESSION["LoginID"];
				$s = "select * from registration where Email='$name'";
				$q = mysqli_query($conn, $s) or die('Error');
				$row = mysqli_fetch_array($q, MYSQLI_BOTH);
			?>
				<a href="#user"><img class="circle responsive-img" src="images/Mobilem.png"></a>
				<a href="#name"><span class="white-text name"><?php echo $row[1]; ?></span></a>
				<a href="#email"><span class="white-text email"><?php echo $row[4]; ?></span></a>
			<?php } else { ?>
				<a class="waves-effect waves-light btn modal-trigger" data-target="loginRegModal"><span class="blue-text name">Register/Sign-In </span></a>
			<?php } ?>
		</div>
	</li>

	<li><a href="index.php" class="active">Home</a></li>
	<li role="presentation"><a href="about.php">About Us</a></li>
	<li role="presentation"><a href="products.php"> Products</a></li>
	<li role="presentation"><a href="UploadAd.php"> Post an Ad</a></li>
	<li> <a href="AllAds.php"> Old Products</a> </li>
	<li><a class="waves-effect waves-light btn modal-trigger" href="#trackmyOrder_Modal">Track My Order</a></li>

	<?php
	if (isset($_SESSION["LoginID"])) {
	?>
		<li><a href="MyProfile.php">My Profile</a></li>
		<!--- <li> <a href="#">My Orders</a></li> ------>
		<li><a href="MyAds.php">My Ads</a></li>
		<li><a href="ChangePassword.php">Change Password</a></li>
		<li><a href="manage/manage.customerlogout.php">Logout</a></li>
	<?php } ?>
</ul>


<!-- Social Icons -->
<!-- <div class="pinned">
	<ul>
		<li>
			<a href="#" target="_blank" class="link2"> <img class="img-responsive" src="images/f.jpg" style="height:40px;width:40px;" />
			</a>
		</li>
		<li><a href="https://twitter.com/" target="_blank" class="link2"> <img class="img-responsive" src="images/t.png" style="height:40px; width:40px;" /></a></li>
		<li><a href="#" target="_blank" class="link2"> <img class="img-responsive" src="images/gg.png" style="height:40px; width:40px;" /></a></li>
		<li><a href="#" target="_blank" class="link2"> <img class="img-responsive" src="images/i.png" style="height:40px; width:40px;" /> </a></li>
		<li><a href="#" class="link2"> <img class="img-responsive" src="images/y.png" style="height:40px; width:40px;" /></a></li>
	</ul>
</div> -->
<!-- Track My Order Modal Structure -->
<div id="trackmyOrder_Modal" class="modal">
	<a style="float:right;" class="center modal-close waves-effect waves-green btn-flat"><i class="fa fa-close"></i></a>
	<div class="modal-content">
		<h4>Track My Order</h4>
		<div class="row">
			<form action="MyTrack.php" method="post" class="col s12">
				<div class="row">
					<div class="input-field col s6">
						<input name="id" id="email" type="text" class="validate" required="" aria-required="true">
						<label for="email">Enter Order Id</label>
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" class="waves-effect waves-green btn-flat" value="Track Order" />
				</div>
			</form>
		</div>
	</div>
</div>



