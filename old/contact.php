<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>

<?php
include('link.php');
 ?>

<!-- for-mobile-apps -->

<!--//end-smooth-scrolling-->
</head>
<body>
	<!--header-->
	<?php 
	
	include('header.php');
	?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contact Us</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--contact-->
	
	<div class="address"><!--address-->
		<div class="container">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="margin-top:-30px;">How To <span style="color:white;"> Find Us</span></h3>
				<p> </p>
			</div>
			
			<div class="address-row">
				<div class="col-md-6 address-left wow fadeInLeft animated" data-wow-delay=".5s">
					<div class="address-grid">
						<h4 class="wow fadeIndown animated" data-wow-delay=".5s">DROP US A LINE </h4>
						<form action="manage/manage.contact-Us.php" method="post">
							<input class="wow fadeIndown animated" data-wow-delay=".6s" type="text" placeholder="Name"  name="name" required >
							<input class="wow fadeIndown animated" data-wow-delay=".7s" type="text" placeholder="Email" name="email" required >
							<input class="wow fadeIndown animated" data-wow-delay=".8s" type="text" placeholder="Subject" name="subject" required >
							<textarea class="wow fadeIndown animated" data-wow-delay=".8s" placeholder="Message" name="address" required ></textarea>
							<input class="wow fadeIndown animated" data-wow-delay=".9s" type="submit" value="SEND">
						</form>
					</div>
				</div>
				<div class="col-md-6 address-right">
					<div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
						<h4>ADDRESS</h4>
						<p>Shop No. UGF D-2, Arif Vikas Chamber, Sector-2, Vikash Nagar, Lucknow, Uttar Pradesh - 226022</p>
					</div>
					<div class="address-info address-mdl wow fadeInRight animated" data-wow-delay=".7s">
						<h4>PHONE </h4>
						<p>+91-6394777570</p>
						<p>+91-9554387950</p>
					</div>
					<div class="address-info wow fadeInRight animated" data-wow-delay=".6s">
						<h4>MAIL</h4>
						<p><a href="mailto:example@mail.com"> mobilemlucknow@gmail.com</a></p>
						
					</div>
				</div>
			</div>	
		</div>	
	</div>
	<div class="contact">
		<div class="container">
			
			<iframe  class="wow zoomIn animated animated" data-wow-delay=".5s" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14234.048728737389!2d80.9392628!3d26.8872356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sShop+No.+UGF+D-2%2C+Arif+Vikas+Chamber%2C+Sector-2%2C+Vikash+Nagar%2C+Lucknow%2C+Uttar+Pradesh+-+226022!5e0!3m2!1sen!2sin!4v1516777700543"  allowfullscreen=""></iframe>
		</div>	
	</div>
	<!--//contact-->	
	<!--footer-->
	<?php 
include('footer1.php');
	?>
	
</body>
</html>