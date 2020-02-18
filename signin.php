
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
				<li class="active">Sign In</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="margin-top:-30px;">Sign-In<span> Form</span></h3>
			<p style="">Please Enter Your Registered Email ID and Password To Login into You MobileM Account.
             To manage Your Orders, Mobile Ads and many more. </p>
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to MobileM Shop ! <br> Not a Member? <a href="register.php">  Register Now »</a> </h4>
			</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form action="manage/manage.customerlogin.php" method="post" >
				    <?php
                            if(isset($_REQUEST["addcart"]))
                            {
                                ?>
                                    <input type="hidden" value="<?php echo $_REQUEST["addcart"]; ?>" name="pid" />
                                <?php
                            }
                        ?>
                        <?php
                            if(isset($_REQUEST["to"]))
                            {
                                ?>
                                    <input type="hidden" value="<?php echo $_REQUEST["to"]; ?>" name="to" />
                                <?php
                            }
                        ?>
                     <input type="text" name="email" class="user" id="email" placeholder="Enter Email" required />   
					  <input type="password" name="password" class="lock" id="password" placeholder="Enter Password" />
					
					<input type="submit" name="Sign In" value="Sign In">
					
				</form>
				
	<!-----------------------form-------------------------->			
		
			</div>
		</div>
	
		<div class="login-page-bottom">
			<h5> - OR -</h5>
			<div class="social-btn"><a href="register.php"><i>Sign-Up</i></a></div>
			<div class="social-btn sb-two"><a href="Forget.php"><i>Forget Password</i></a></div>
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