
<!DOCTYPE html>
<html>
<head>
<?php  
include('link.php');

?>
</head>
<body>

  <?php
            if(isset($_SESSION["LoginID"]))
            {
                header("location:./");
            }
        ?>
	<!--header-->
	<?php include('header.php');?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li> <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
				<li class="active">Sign In</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="margin-top:-30px;">Password<span> Recovery</span></h3>
			<p> Please ! Enter Registered Mobile Number To Recover Your Password </p>
		</div>
		<div class="widget-shadow">
		<!-----
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to MobileM Shop! <br> Not a Member? <a href="register.php">  Register Now »</a> </h4>
			</div>
			-------->
			<div class="login-body wow fadeInUp animated" data-wow-delay=".5s">
				<form action="manage/manage.forgetcode.php?action=forget" method="post" >
			        <!---- <input type="text" name="email" class="user" id="email" placeholder="Enter Email" required />  ----->
                     <input type="text" name="mobile" class="user" id="email" placeholder="Enter mobile number" required />   
					
					<input type="submit" name="Sign In" value="Send Otp">
					
				</form>
				
	<!-----------------------form-------------------------->			
		
			</div>
		</div>
	
		
	</div>
	<!--//login-->
	<!--footer-->
	
	<?php
include('footer1.php');

	?>
	
	
	<!--footer-->
	
</body>
</html>