<?php

session_start();

require_once("manage.database.php");
require_once("class.logindetails.php");

date_default_timezone_set("Asia/Kolkata");

$logindetail = new logindetails;

$email = mysqli_real_escape_string($conn, $_POST['email']);
$email = strtolower($email);

//echo $email."<br/>";

$pass = mysqli_real_escape_string($conn, $_POST['password']);
$pass = md5($pass);
//echo $pass."<br/>";
//$systemid=$_SESSION["SystemID"];
//echo $systemid;     system id generate here



$query1 = "select * from login where Email='$email' and Password='$pass'";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_array($result1, MYSQLI_BOTH);


if ($row1 != NULL) {
	if ($row1["CurrentStatus"] == "false") {
		$mac = $logindetail->get_mac();
		$ip = $logindetail->get_ip();
		$browser = $logindetail->get_useragent();
		$os = $logindetail->get_os();
		$uname = $logindetail->get_userName();
		$date = date("Y-m-d");
		$time = date("h:i:sa");

		$logincount = $row1["LoginCount"];
		$logincount = $logincount + 1;

		$query2 = "insert into logindetails(Email,Mac,IP,Browser,OS,UserName,LoginDate,LoginTime,UserType,LoginFrom) values('$email','$mac','$ip','$browser','$os','$uname','$date','$time','Customer','Website')";
		$st = "true";

		$from = "Website";
		$datetime = $date . " " . $time;

		$query3 = "update login set LastLoginDateTime='$datetime',CurrentStatus='$st',CurrentLoginFrom='$from',LoginCount='$logincount' where Email='$email'";

		try {
			mysqli_autocommit($conn, FALSE);
			 mysqli_query($conn, $query2);
			 mysqli_query($conn, $query3);

			if (mysqli_commit($conn)) {
				$_SESSION['LoginID'] = $row1['Email'];
				if (isset($_POST["pid"])) {
					$pid = $_POST["pid"];
					header("location:manage.cart.php?action=add&pid=$pid");
				} else if (isset($_POST['to'])) {
					if ($_POST["to"] == "uploadad") {
						header("Location:../UploadAd.php");
					}
				} else {
					$response['error'] = false;
					$response['message'] = 'Login Succcessful.';
					$response['redirect'] = './';
					echo json_encode($response);
				}
			}
		} catch (Exception $e) {
			mysqli_rollback($conn);
			$response['error'] = true;
			$response['message'] = 'Login Unsuccessful.' . $e;
			echo json_encode($response);
		}
	} else {
		//header("Location:../signin.php?error=blocked"); // error login blocked
		$response['error'] = true;
		$response['message'] = 'Account is Logged in Already ' . $row1["CurrentStatus"];
		echo json_encode($response);
	}
} else {
	$response['error'] = true;
	$response['message'] = 'Wrong Email or Password';
	echo json_encode($response);
	//header("Location:../signin.php?error=logindetails"); // error in user id or password
}
