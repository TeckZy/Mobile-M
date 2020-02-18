<?php
session_start();
require_once("../../manage/manage.database.php");
date_default_timezone_set("Asia/Kolkata");
$action=$_REQUEST["action"];
switch($action)
{
    case "add":
        
        $cname=$_POST["cname"];
        $date=date("Y-m-d");
        $status="true";
        $sql="insert into category(CategoryName,Status,Date) values('$cname','$status','$date')";
        if(mysqli_query($conn,$sql))
        {
            header("location:../webadmin/Category.php?msg=added");
        }
        else
        {
            header("location:../webadmin/Category.php?msg=error");
        }
        
        break;
        
    case "del":
        $cid=$_REQUEST["cid"];
        
        $sql="delete from category where CategoryID='$cid'";
        if(mysqli_query($conn,$sql))
        {
            header("location:../webadmin/Category.php?msg=deleted");
        }
        else
        {
            header("location:../webadmin/Category.php?msg=error");
        }
        
        
        break;
		
		
		case "change":
		    
		   $email=$_SESSION['AdminID'];
		    $new=$_POST['new'];
		    $con=$_POST['con'];
			
			$newpass=mysqli_real_escape_string($conn,$new);
			$newpass=md5($newpass);
			//echo $newpass."<br/>";

			$conpass=mysqli_real_escape_string($conn,$con);
			$conpass=md5($conpass);
			//echo $conpass."<br/>";
		
		$sel="select * from admin where Email='$email'";
	    $q=mysqli_query($conn,$sel) or die('Error');
		$row=mysqli_fetch_array($q,MYSQLI_BOTH);
		if($row==true)
		{
		   if($row['LoginStatus']=='true')
		   {
			     if($newpass==$conpass)
			   {
				   $up="update admin set Password='$conpass' where Email='$email'";
                   $qq=mysqli_query($conn,$up) or die('Error');
                   if($qq)
				   {
					  header("location:../index.php?msg=update");
				   }
                  else
				  { 
			            echo "<srcipt>
					        alert('Change Password failled');
							window.location.href='../webadmin/profile.php';
					         </script>";
				  }				   
			   }
			   else
			   {
				   echo "<script> 
				         alert('New Password and Confirm Password Not match');
						window.location.href='../webadmin/profile.php';
						 </script>";
			   }
		   }	
           else
		   {
			    echo   "<script> 
				         alert('Not Change Password');
						window.location.href='../webadmin/profile.php';
						</script>";	   
		   }		   
		}
		else
		{
		   echo   "<script> 
				         alert('Email Not match');
						 window.location.href='../webadmin/profile.php';
						</script>";	
		}
		
			
		break;
		
		
		case "createacount":
		        $email=mysqli_real_escape_string($conn,$_POST['email']);
				$email=strtolower($email);
				//echo $email."<br/>";

				$pass=mysqli_real_escape_string($conn,$_POST['password']);
				$pass=md5($pass);
				//echo $pass."<br/>";
				
				$up="insert into admin(Email,Password) values('$email','$pass')";
				$q=mysqli_query($conn,$up) or die('Error');
				if($q)
				{
					header('location:../webadmin/createacount.php?successfully');
				}
              else
			  {
				  header('location:../webadmin/createacount.php?failled');
			  }
		break;
}

?>



