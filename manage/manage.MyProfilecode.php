<?php
session_start();
include('manage.database.php');



if (isset($_POST['name']) && isset($_POST['mobile']) && isset($_POST['gender']) && isset($_POST['email'])) {
	$name = $_POST['name'];
	//echo $name."<br/>";

	$mobile = $_POST['mobile'];
	//echo $mobile."<br/>";

	$gender = $_POST['gender'];
	//echo $gender."<br/>";

	$email = $_POST['email'];
	//echo $email."<br/>";

	// $password = mysqli_real_escape_string($conn, $_POST['password']);
	// $password = md5($password);
	//$password=$_POST['password'];
	//echo $password."<br/>";

	// $date = $_POST['Date'];
	//echo $date."<br/>";
	$update = "update registration set Name='$name', Mobile='$mobile',Gender='$gender' where Email='$email'";
	if (mysqli_query($conn, $update)) {
		$response['error'] = false;
		$response['message'] = 'Fields Updated Successfully!-->';
		$response['redirect'] = './MyProfile.php';
		echo json_encode($response);
	} else {
		$response['error'] = false;
		$response['message'] = 'An Error Occurred!-->';
		$response['redirect'] = './MyProfile.php';
		echo json_encode($response);
	}
}


if (isset($_POST['newPassword']) && isset($_POST['rePassword'])) {
	$email = $_SESSION['LoginID'];
	//echo $email."<br/>";

	$date = date('Y-m-d');
	date_default_timezone_set('asia/kolkata');
	$time = date('h:i:sa');
	$datetime = $date . "  " . $time;


	$new = mysqli_real_escape_string($conn, $_POST['newPassword']);
	$new = md5($new);
	//echo  $new."<br/>"; 

	$con = mysqli_real_escape_string($conn, $_POST['rePassword']);
	$con = md5($con);

	if ($new != $con) {
		$response['error'] = true;
		$response['message'] = 'Passwords Dont Match';
		echo json_encode($response);
	}
	$sel = "select CurrentStatus from login where Email='$email'";
	$q = mysqli_query($conn, $sel) or die('Error');
	$row = mysqli_fetch_array($q, MYSQLI_BOTH);
	if ($row != null && $row['CurrentStatus'] == 'true') {
		if ($new == $con) {
			$up = "update login set LastLoginDateTime='$datetime', Password='$con' where Email='$email'";
			if (mysqli_query($conn, $up)) {
				$response['error'] = false;
				$response['message'] = 'Password Changed Successfully!';
				$response['redirect'] = './MyProfile.php';
				echo json_encode($response);
			} else {
				$response['error'] = true;
				$response['message'] = 'Change Password Failed';
				echo json_encode($response);
			}
		}
	} else {
		$response['error'] = true;
		$response['message'] = 'Please Login First';
		echo json_encode($response);
	}
}


if (isset($_POST['state']) && isset($_POST['city']) && isset($_POST['address']) && isset($_POST['pincode'])) {
	$state = $_POST['state'];

	$city = trim($_POST['city']);

	$pincode = $_POST['pincode'];


	$type = $_POST['addressType'];
	$availTime = $_POST['availTime'];

	if ($availTime == "on") {
		$availTime = 0;
	} else {
		$availTime = $_POST['availFrom'] . 'To' . $_POST['availTo'];;
	}

	$address = trim($_POST['address']);
	$landmark = null;
	if ("" != trim($_POST['landmark'])) {
		$landmark = $_POST['landmark'];
	}
	$email = $_SESSION['LoginID'];

	$row = mysqli_query($conn, "select * from addresses where registration_id = (select UserId from registration where Email='" . $_SESSION['LoginID'] . "') ");
	if (mysqli_num_rows($row) == 0) {
		$sql =	"insert INTO addresses (registration_id, State, City, Pincode, Type, Timings, address, landmark) VALUES ((select UserId from registration where Email='$email'), '$state', '$city', '$pincode', '$type', '$availTime', '$address', '$landmark')";
		if (mysqli_query($conn, $sql)) {
			$response['error'] = false;
			$response['message'] = 'Address Updated Successfully!';
			$response['redirect'] = './MyProfile.php';
			echo json_encode($response);
		} else {
			$response['error'] = true;
			$response['message'] = mysqli_error($conn);
			echo json_encode($response);
		}
	} else {
		$update = "update addresses set State='$state', City='$city', Pincode='$pincode', Type='$type', Timings='$availTime', address='$address', landmark='$landmark' where registration_id = (select UserId from registration where Email='$email')";
		if (mysqli_query($conn, $update)) {
			$response['error'] = false;
			$response['message'] = 'Fields Updated Successfully!';
			$response['redirect'] = './MyProfile.php';
			echo json_encode($response);
		} else {
			$response['error'] = false;
			$response['message'] = mysqli_error($conn);
			echo json_encode($response);
		}
	}
}
