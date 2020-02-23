<?php

session_start();

require_once("../../manage/manage.database.php");
require_once("../../manage/class.logindetails.php");

date_default_timezone_set("Asia/Kolkata");

$logindetail = new logindetails;

$email=mysqli_real_escape_string($conn,$_POST['email']);
$email=strtolower($email);
//echo $email."<br/>";

$pass=mysqli_real_escape_string($conn,$_POST['password']);
$pass=md5($pass);
//echo $pass."<br/>";


$query1="select * from admin where Email='$email' and Password='$pass'";
$result1=mysqli_query($conn,$query1);
$row1=mysqli_fetch_array($result1,MYSQL_BOTH);

if($row1!=NULL)
{
		if($row1["LoginStatus"]=="true")
		{
			$mac=$logindetail->get_mac();
			$ip=$logindetail->get_ip();
			$browser=$logindetail->get_useragent();
			$os=$logindetail->get_os();
			$uname=$logindetail->get_userName();
			$date=date("Y-m-d");
			$time=date("h:i:sa");
			
			$logincount=$row1["LoginCount"];
			$logincount=$logincount+1;
			
			$query2="insert into logindetails(Email,Mac,IP,Browser,OS,UserName,LoginDate,LoginTime,UserType,LoginFrom) values('$email','$mac','$ip','$browser','$os','$uname','$date','$time','Admin','Website')"; 				
            $st="true";

            $from="Website";
            $datetime=$date." ".$time;
			$query3="update login set LastLoginDateTime='$datetime',CurrentStatus='$st',CurrentLoginFrom='$from',LoginCount='$logincount' where Email='$email'";
			
			if(mysqli_query($conn,$query3))
			{
				if(mysqli_query($conn,$query2))
				{
                    $_SESSION['AdminID']=$row1['Email'];
                    
                    header("Location:../webadmin/dashboard.php"); // Login Success					
				}
				else
				{
					header("Location:../index.php?error=query"); // Login error
				}
			}
			else
			{
				header("Location:../index.php?error=query"); // Login error
			}			
		}
		else
		{
			header("Location:../index.php?error=blocked"); // error login blocked
		}
}
else
{
	header("Location:../index.php?error=logindetails"); // error in user id or password
}



?>