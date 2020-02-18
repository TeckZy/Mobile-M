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
</head>
<body>

  <?php
            if(isset($_SESSION["LoginID"]))
            {
                header("location:./");
            }
        ?>

         <?php
            $err="";
            $success="";
        
            if(isset($_REQUEST["error"]))
            {
            $err=$_REQUEST['error'];
            }
            if(isset($_REQUEST["success"]))
            {
            $success=$_REQUEST['success'];
            }
            if($success=="reg")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Success !",
                    text: "Your Registration for MobileM.in is successfull, now you can shop with us and enjoy all services of MobileM.in",
                    type: "success",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }
        if($err=="logindetails")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Warning !",
                    text: "You entered incorrect Email Address or Password.",
                    type: "warning",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }
        if($err=="blocked")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Warning !",
                    text: "Your login ID is blocked. Please contact to admin for details.",
                    type: "warning",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }
         if($err=="query")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Warning !",
                    text: "Some Technical Error. Please Contact to admin or try again leter.",
                    type: "warning",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }
        ?>






	<!--header-->
	<?php include('header.php');?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Forgot Password</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title">Forgot<span> Password</span></h3>
			<p>Please Enter Your Registered Email ID MobileM  Account.
            </p>
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to MobileM Shoppe ! <br> Not a Member? <a href="register.php">  Register Now »</a> </h4>
			</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form action="manage/manage.customerlogin.php" method="post" >
				     <p>Old Password</p>
                     <input type="text" name="old" class="user" id="email" placeholder="Enter Email" required /> 
				      <p>New Password</p>
                     <input type="text" name="new" class="user" id="email" placeholder="Enter Email" required />  
                      <p> Confirm Password</p>					 
					  <input type="password" name="con" class="lock" id="password" placeholder="Enter Password" />
					
					<input type="submit" name="Sign In" value="Sign In">
					
				</form>
				
	<!-----------------------form-------------------------->			
		
			</div>
		</div>
		<div class="login-page-bottom">
			
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