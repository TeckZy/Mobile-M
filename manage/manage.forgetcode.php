<?php
session_start();
 require_once("manage.database.php");
 $flag=$_REQUEST['action'];
 
 function sendMySMS($mobile,$message)
{
    $username="MOBILEM";
    $password="mobilem@123";
    $route="205";
    $senderid="MoMLko";
    $message=urlencode($message);
    
    $apiurl="http://sendsms.sandeshwala.com/API/WebSMS/Http/v1.0a/index.php?username=$username&password=$password&sender=$senderid&to=$mobile&message=$message&reqid=1&format={json|text}&route_id=$route";
    $smsapires=file_get_contents($apiurl);
    if($smsapires!=null || $smsapires!="")
    {
        return true;
    }
    else
    {
        return false;
    }
}
 
 
 switch($flag)
 {
	  case "forget":
                    
            $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
            echo $mobile."<br/>";
            //$email=mysqli_real_escape_string($conn,$_POST['email']);
            //echo $email."<br/>";
            $otp=rand(100000,999999);
             //echo $otp;
          
            $st1="false";
            
            $query1="select * from registration where Mobile='$mobile'";
            $res1=mysqli_query($conn,$query1);
            $row1=mysqli_fetch_array($res1,MYSQLI_BOTH);
            if($row1==true)
            {
				$email=$row1['Email'];
				$up="update  registration set OTPCode='$otp' where Email='$email'";
				$qqq1=mysqli_query($conn,$up)or die('updation error');
				if($qqq1)
				{
				   	        $sms="Your MobileM.in OTP Code is $otp";
                            $mob=$mobile;            
                            $response=sendMySMS($mob,$sms);
                            //echo $response;
                            sleep(2);
                            $_SESSION['useremail']=$email;
                            header("Location:../Verify-OTP2.php");
				}
				else
				{
					echo "<script>
					      alert('please resend otp ?');
						  window.location.href='../Forget.php';
					      </script>";
				}
                          
			}
                else
                {
					echo "<script>
					      alert('Your Email and Mobile Number Does not exist');
						  window.location.href='../register.php';
					      </script>";
                   
                }
        
            break;
			
		case "otp":
            
            $otpcode=mysqli_real_escape_string($conn,$_POST['otp']);
            //echo $otpcode."<br/>";
            $usermail=$_SESSION['useremail'];
		    //echo $usermail."<br/>";
			
            $st="true";
            $query1="select * from registration where OTPCode='$otpcode'";
            $res1=mysqli_query($conn,$query1);
            $row1=mysqli_fetch_array($res1,MYSQLI_BOTH);
           
			
            if($row1['OTPCode']==$otpcode)
            {
              
                        //unset($_SESSION['useremail']);
                        header("Location:../forgetpassword.php?success=otp match successfully"); // Registration Successfully completed  

            }
            else
            {
                header("Location:../Verify-OTP2.php?error=otpcode"); // invalid OTP code
            }   
            break;
		
         
        case "changepassword":
		
                $usermail=$_SESSION['useremail'];
			    //echo $usermail."<br/>";
				
				 $new=mysqli_real_escape_string($conn,$_POST['new']);
				 $new=md5($new);
                // echo $new."<br/>";
                 $con=mysqli_real_escape_string($conn,$_POST['con']);
				 $con=md5($con);
				 //echo $con."<br/>";
			
				 $ss="select * from login where Email='$usermail'";
				 $qq2=mysqli_query($conn,$ss);
				 $row=mysqli_fetch_array($qq2,MYSQLI_BOTH);
				 if($row)
				 {
					 if($new==$con)
					 {
						 $update="update login set Password='$con' where Email='$usermail'";
						 $q=mysqli_query($conn,$update);
						 if($q)
						 {
						
							header("Location:../signin.php?success=successfully");
						 }
						 else{
						
							 header("Location:../forgetpassword.php?msg=Error");
						 }
					 }
						 
				 }
				 else
				 {
					 echo "<script>
					       alert('Some Error Occured ? Please Contact Admin');
						   window.location.href='../signin.php?msg=Error';
						    </script>";
					 
				 }
			
         break;		
		

 }





 ?>