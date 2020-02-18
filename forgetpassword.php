
<!DOCTYPE html>
<html>
<head>
<?php  
include('link.php');
//echo $_SESSION['useremail'];
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
			<h3 class="title">Reset<span> Password</span></h3>
			<p> Enter New Password For Your MobileM Acount. </p>
		</div>
		<div class="widget-shadow">
			
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form action="manage/manage.forgetcode.php?action=changepassword" method="post" >
				  
					  <input type="password" name="new" class="lock" id="password" placeholder="Enter New Password" />
					  <input type="password" name="con" class="lock" id="password" placeholder="Enter Confirm Password" />
					
					<input type="submit" name="Sign In" value="Reset Password">
					
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