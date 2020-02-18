<!DOCTYPE html>
<html>
<head>
<?php include('link.php'); ?>

</head>
<body>
 <?php
            if(isset($_SESSION["LoginID"]))
            {
                header("location:./");
            }
        ?>
 
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
				<li class="active">Register</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="margin-top:-20px;">Register<span> Form</span></h3>
		
		</div>
		<div class="widget-shadow" style="margin-top:-10px;">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".5s">
				<h4>Already have an Account ?<a href="signin.php">  Sign In »</a> </h4>
			</div>
			<div class="login-body">
				<form action="manage/manage.customerregistration.php?action=reg" method="post" class="wow fadeInUp animated" data-wow-delay=".5s">
					 <div class="form-group">
                         
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name" data-validation="required" data-validation-error-msg="Name is invalid" />
                        </div>
                        <div class="form-group">
                          
                            <select name="gender" id="gender" class="form-control">
                                <option value="">--Select Gender--</option>
                                <option selected>Male</option>
                                <option>Female</option>                                 
                            </select>
                        </div>
                        <div class="form-group">
                            
                            <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter 10 digits mobile Number"data-validation-error-msg="Mobile Number is invalid"  data-validation="length" data-validation-length="10"/>
                        </div>
                        
                        <div class="form-group">
                           
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email Address" data-validation="email required" data-validation-error-msg="Email is Invalid"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password for login into MobileM Account" data-validation="length" data-validation-length="min6" data-validation-error-msg="Manimum Password 6 character"/>
                        </div>
                        <div class="form-group">
                            <label style="font-family: 'Rozha One', serif;
                             font-family: 'Noto Serif', serif;">
                                <input type="checkbox" id="terms" name="terms" required />
                                I Agree to the Terms and Conditions for using MobileM.in
                            </label>
                        </div>
					<button class="btn btn-success"> Register</button>
				</form>
				
			</div>
		</div>
	</div>
	
		<script>
			$(document).ready(function(){
				$.validate({
				
					validateOnBlur : false,
					errorMessagePosition : 'top',
					scrollToTopOnError : false 
						});
			});
			
		</script>
	<!--//login-->
	<!--footer-->
	<?php include('footer1.php');?>
	<!--//footer-->				
	
</body>
</html>