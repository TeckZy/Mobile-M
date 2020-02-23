
<!DOCTYPE html>
<html>
<head>
<?php

include('link.php');

//echo $_SESSION['useremail'];
 ?>

</head>
<body>
    <script>
            function changemobile(mobile)
            {
                $("#newmobile").val(mobile);
                $("#updatemobile").modal("show");
            }
        </script>
		
	<?php 
	include('header.php');
	?>
	<!---------------------otp -------------------------->
	
	 <?php

            if(!isset($_SESSION["UserID"]))
            {
                header("location:Registration");
            }
            $userid=$_SESSION["UserID"];
            ?>

        <div class="modal fade" id="updatemobile">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Update Mobile Number</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="manage/manage.customerregistration.php?action=changemobile">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="newmobile">Enter New Mobile Number</label>
                                        <input type="number" id="newmobile" name="newmobile" class="form-control" />
                                        <span class="help-block">We will resend OTP code to your new mobile number for verification.</span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Update Mobile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal" > Close </button>
                    </div>
                </div>
            </div>
        </div>
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
            if($err=="otp")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Error !",
                    text: "There is some Technical Error in validating your Mobile Number. Please Contact admin or try again leter.",
                    type: "error",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }
            
            if($err=="otpcode")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({ 
                    title: "Warning !",
                    text: "You entered incorrect OTP.",
                    type: "warning",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }   
        
        if($err=="exist")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({ 
                    title: "Warning !",
                    text: "This mobile number already registered. Please Use diffrent Mobile Number.",
                    type: "warning",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }   
        
        
        if($err=="mobile")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({ 
                    title: "Warning !",
                    text: "Mobile Number Updation Failed. Please try again leter.",
                    type: "warning",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }  
            
            if($success=="otpresend")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({ 
                    title: "Success !",
                    text: "OTP has been resent to your Mobile Number.",
                    type: "success",
			        confirmButtonText: "Okay"
		          });	
	       });
        </script>
        <?php
            }   
            
        if($success=="mobile")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({ 
                    title: "Success !",
                    text: "Mobile Number Updated Successfully. We have sent OTP to your updated mobile number again. Please Verify OTP.",
                    type: "success",
			        confirmButtonText: "Okay"
		          });	
	       });
        </script>
        <?php
            }   
        ?>
        
		<!--  Main Container -->
		<div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10" style="color:rgb(255, 99, 71);"> <h1> </h1>
          
				</div>
                <div class="col-sm-1"></div>
            </div>
         
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="manage/manage.forgetcode.php?action=otp" method="post" >
                        <div class="form-group">
                            <span class="help-block" >
							  <h3 class="title">Mobile Number <span> Verification</span></h3>
							  <hr/>
			                   <p> We have sent an 6 digits OTP (One Time Password) to your registered mobile number  </p>
                            
                              
                                Please enter the same OTP code to continue...
                                <br/><br/>
                                OTP Not Received, <!------ <a href="manage/manage.customerregistration.php?action=otpresend" class="btn btn-link">Resend</a>  --------------->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="otp">Enter OTP code</label>
                            <input type="number" name="otp" class="form-control" id="otp" placeholder="Enter Same OTP Code" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" >Verify OTP</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
            
          
		</div>

	<?php include('footer1.php');?>
	<!--//footer-->				
	
</body>
</html>