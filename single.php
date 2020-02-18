<!DOCTYPE html>
<html>

<head>
	<title>Mobilem Shop a Ecommerce Online Shopping</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<?php
	include('link.php');
	?>
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//for-mobile-apps -->
	<!--Custom Theme files -->

	<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider1.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:400i" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /-->

	<!--js-->

	<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
	<!-- <script src="js/bootstrap.js"></script> -->
	<!-- <script src="js/modernizr.custom.js"></script> -->
	<!--//js-->
	<!--flex slider-->
	<!-- <script defer src="js/jquery.flexslider.js"></script> -->

	<!-- <script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script> -->
	<!--flex slider-->
	<!-- <script src="js/imagezoom.js"></script> -->
	<!--cart-->
	<!-- <script src="js/simpleCart.min.js"></script>

<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script> -->
	<!--//animation-effect-->
	<!--start-smooth-scrolling-->
	<!-- <script type="text/javascript" src="js/move-top.js"></script> -->
	<!-- <script type="text/javascript" src="js/easing.js"></script>	 -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>

	<!--//end-smooth-scrolling-->
	<style>

	</style>

</head>

<body>

	<?php
	include('manage/manage.database.php');
	$id = "";
	if (isset($_REQUEST["id"])) {
		$id = $_REQUEST["id"];
	} else {
		header("location:Products");
	}
	?>


	<!--header-->
	<?php include('header.php'); ?>
	<!--//header-->

	<!--//breadcrumbs-->
	<!--single-page-->
	<!---------show images coding---------------------->

	<?php
	$sql1 = "select * from products where productid='$id'";
	$res1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array($res1, MYSQLI_BOTH);
	?>
	<section>

	

	</section>
	<div class="section">
		<div class="row">
			<div class="pinned col s6">
			<div class=" container">
					<div class="carousel carousel-slider">
						<?php
						$s1 = "select * from product_images where ProductID = $id";
						$q = mysqli_query($conn, $s1) or die('Error');
						$i = 0;
						$imgIndex = 0;
						$maxImage = 4;
						$img_row = mysqli_fetch_array($q, MYSQLI_BOTH);
						for ($i = 0; $i < count($img_row); $i++) {
							if ($maxImage == 0) {
								break;
							}
							if (!empty($img_row['showcaseImage' . $maxImage])) {

						?>

								<a class="carousel-item" href="#<?php $imgIndex += 1;
																echo $imgIndex; ?>!">

									<img src="Admin/productsimg/<?php echo $img_row['showcaseImage' . $maxImage]; ?>" alt="..." style="height:500px">
								</a>
						<?php


							}
							$maxImage -= 1;
						}
						?>
					</div>
				</div>
			</div>
			<!-- RIGHT PANEL -->
			<div style="float:right;" class="col s6">
				<h5 style="font-family:'IBM Plex Serif', serif;">
					<?php echo $row1["Name"] ?> <br />
				</h5>
				<p style="font-size:18px;color:black;font-family: 'IBM Plex Serif', serif;"><?php echo $row1["SubName"]; ?></p>

				<hr>

				<div>
					<?php
					if ($row1["Discount"] > 0) {
						$price = $row1["Price"];
						$dis = intval($row1["Discount"]);

						$disprice = $dis / 100 * $price;
						$disprice = intval($disprice);
						$newprice = $price - $disprice;

					?>

						<div class="col s12">
							<p class="blue-text"><?php echo $dis; ?> % Discount</p>
							<h4 class="teal-text"><b><i class="fa fa-rupee"> </i><?php echo $newprice; ?> /- </b> <s class="grey-text" style="font-size:11px; font-family:'IBM Plex Serif',serif;">
									<i class="fa fa-rupee"></i> <?php echo $row1["Price"]; ?> </s></h4>
						<?php
					} else {
						?>
							<h4 class="teal-text"><b><i class="fa fa-rupee"> </i><?php echo $row1["Price"] ?> /- </b></h4>

						<?php
					}
						?>
						</div>
						<!-- OFFERS -->
						<div class="col s12">
							<ul>
								<li>,mvbsdjbsvkj</li>
								<li>,mvbsdjbsvkj</li>
								<li>,mvbsdjbsvkj</li>
							</ul>

						</div>
						<!-- COLOR -->
						<div class="col s12">
							Color:
							<ul>
								<li>,mvbsdjbsvkj</li>
								<li>,mvbsdjbsvkj</li>
								<li>,mvbsdjbsvkj</li>
							</ul>

						</div>

						<!-- DELIVERY -->
						<div class="row">
							<div class="col s12">
								Delivery:
								<div class="input-field inline">
									<input id="deliverypin" type="number" class="validate">
									<label for="deliverypin">Check your Pincode</label>
								</div>
							</div>
						</div>
						<!-- SELLER -->
						<p>Seller: Flashstar Commerce</p>

						<div class="col s12">
						<p  style=" font-family:'IBM Plex Serif',serif;">
                    <?php echo $row1["Description"] ?>
                    </p>
						</div>
						





				</div>



				<br />
			</div>
		</div>
	</div>


	<!-- <script src="js/main.js"></script> -->
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!--//single-page-->
	<!--footer-->
	<?php include('footer1.php'); ?>
</body>

</html>