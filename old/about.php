
<!DOCTYPE html>
<html>
<head>
<?php 

include('link.php');

?>
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
				<li class="active">About us</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--about-->
	<div class="about">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="margin-top:-20px;">About<span> Us</span></h3>
	
				<hr/>
			</div>
			<div class="about-info">
			   <div class="col-sm-6">
                   <img src="images/smartphones.jpg" style="width:90%;"/>
			   </div>
			   <div class="col-sm-6">

                <p class="" style=" font-size:17px; margin-top:-20px; line-height:26px;"> <br/>
				Our Company is a Service Oriented Company <br/>
				With all the related from mobile like -    <br/>
				Buy new Mobile                         <br/>
				Sell Old Products (Post Ad for Old Products) <br/>
				Buy and Sell all accessories  <br/>
                All type Recharge Available   <br/> 
                </p>

			   </div>				
			</div>
		</div>
	</div>
	<!--//about-->
	<!--footer-->
	<?php 

	include('footer1.php');

	?>
	
</body>
</html>