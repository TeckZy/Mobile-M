<?php
session_start();
require_once("manage.database.php");

function sendMySMS($mobile, $message)
{
    $username = "MOBILEM";
    $password = "mobilem@123";
    $route = "205";
    $senderid = "MoMLko";
    $message = urlencode($message);

    //$apiurl="http://sendsms.sandeshwala.com/API/WebSMS/Http/v1.0a/index.php?username=$username&password=$password&sender=$senderid&to=$mobile&message=$message&reqid=1&format={json|text}&route_id=$route";
    // $smsapires=file_get_contents($apiurl);
    // if($smsapires!=null || $smsapires!="")
    // {
    //     return true;
    // }
    // else
    // {
    //     return false;
    // }
    return true;
}

date_default_timezone_set("Asia/Kolkata");

if (isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['password'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    // echo $name."<br/>";
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    // echo $mobile."<br/>";
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    // echo $gender."<br/>";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // echo $email."<br/>";
    // $email - strtolower($email);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // echo $password."<br/>";
    $password = md5($password);

    $otp = rand(100000, 999999);
    //echo $otp;
    $st1 = "false";

    $date = date("Y-m-d");
    $time = date("h:i:sa");
    $datetime = $date . " " . $time;

    $query1 = "select * from registration where Email='$email' or Mobile='$mobile'";
    $res1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($res1, MYSQLI_BOTH);
    if ($row1 == null || $row1["OTPStatus"] == "false") {
        $query2 = "insert into registration(Name,Gender,Mobile,Email,Password,OTPCode,OTPStatus,Date) values('$name','$gender','$mobile',LOWER('$email'),'$password','$otp','$st1','$datetime')";

        try {
            mysqli_autocommit($conn, FALSE);
            mysqli_query($conn,$query2);
            $userid = mysqli_insert_id($conn);
            $query3 = "insert into login(id,Email,Password,LastLoginDateTime,LastLogoutDateTime,LoginCount,LoginStatus,CurrentStatus) values('$userid',LOWER('$email'),'$password','0','0',0,'$st1','$st1')";

            mysqli_query($conn,$query3);

            if (mysqli_commit($conn)) {
                $sms = "Your MobileM.in OTP Code is $otp.";
                $mob = $mobile;
                $smsres = sendMySMS($mob, $sms);
                if($smsres == true){
                    $_SESSION['UserID'] = $userid;
                    $response['error'] = false;
                    $response['message'] = 'Registration Successfull! OTP Sent to : ' . $mobile;
                    $response['redirect'] = 'Verify-OTP.php';
                    echo json_encode($response);
                   
                    }else{
                        $response['error'] = true;
                        $response['message'] = 'Registration Successfull! Couldn\'t Send OTP to : ' . $mobile;
                        echo json_encode($response);
                        
                        sleep(2);
                        header("Location:../Verify-OTP.php");

                    }
               
            }
        } catch (Exception $e) {
            mysqli_rollback($conn);
            $response['error'] = true;
            $response['message'] = 'An Error Occured: ' . $e;
            echo json_encode($response);
        }
    } else {
                          $response['error'] = true;
                          $response['message'] = 'Your Email and Mobile Number Already Exist';
                          echo json_encode($response);
        // header("Location:../register.php?error=exist"); // email already exists  
    }
}

if (isset($_POST['otp'])) {

    $otpcode = mysqli_real_escape_string($conn, $_POST['otp']);
    //echo $otpcode;

    $regid = $_SESSION['UserID'];

    $st = "true";
    $query1 = "select OTPCode,Email from registration where UserID='$regid'";
    $res1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($res1, MYSQLI_BOTH);

    if ($row1['0'] == $otpcode) {
        $email = $row1['1'];
        $query2 = "update registration set OTPStatus='$st' where UserID='$regid'";
        $query3 = "update login set LoginStatus='$st' where Email='$email'";
        try {
            mysqli_autocommit($conn, FALSE);
            mysqli_query($conn, $query2);
            mysqli_query($conn, $query3);

            if (mysqli_commit($conn)) {
                unset($_SESSION['UserID']);
                

                // Registration Successfully completed  
                $response['error'] = false;
                $response['message'] = 'Registration Successfull' . $mobile;
                echo json_encode($response);
                sleep(2);
                header("Location:../");
            }
        } catch (Exception $e) {
            // OTP validation failed
            mysqli_rollback($conn);
            $response['error'] = true;
            $response['message'] = 'An Error Occured: ' . $e;
            echo json_encode($response);
        }
    } else {
        $response['error'] = true;
        $response['message'] = 'Invalid OTP COde';
        echo json_encode($response);
        // header("Location:../Verify-OTP.php"); // invalid OTP code
    }
}

if (isset($_POST['newmobile'])) {

    $newmobile = mysqli_real_escape_string($conn, $_POST['newmobile']);
    // echo $newmobile;

    $regid = $_SESSION['UserID'];

    $query2 = "select Mobile,OTPStatus,OTPCode from registration where UserID='$regid'";
    $res2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($res2, MYSQLI_BOTH);
    if ($row2 != null) {
        if ($row2["1"] == "false" || $row2['0'] != $newmobile) {
            $query2 = "update registration set Mobile='$newmobile' where UserID='$regid'";
            $query3 = "select Mobile,OTPCode from registration where UserID='$regid'";
            try {
                mysqli_autocommit($conn, FALSE);
                mysqli_query($conn, $query2);
                mysqli_query($conn, $query3);

                if (mysqli_commit($conn)) {
                    $otp = $row1['2'];
                    $sms = "Your MobileM.in OTP Code is $otp.";

                    $smsresult = sendMySMS($newmobile, $sms);

                    // header("Location:../Verify-OTP.php?success=mobile"); // Number updated and otp resend
                    if($smsresult == true){
                    $response['error'] = false;
                    $response['message'] = 'OTP Sent to : ' . $mobile;
                    echo json_encode($response);

                    }else{
                        $response['error'] = true;
                        $response['message'] = 'Couldn\'t Send OTP to : ' . $mobile;
                        echo json_encode($response);

                    }
                    // Registration Successfully completed  
                    
                }
            } catch (Exception $e) {
                // OTP validation failed
                mysqli_rollback($conn);
                // Number not updated
                $response['error'] = true;
                $response['message'] = 'An Error Occured: ' . $e;
                echo json_encode($response);
            }
        } else if($row2["1"] == "false" || $row2['0'] == $newmobile){
            $otp = $row1['2'];
            $sms = "Your MobileM.in OTP Code is $otp.";

            $smsresult = sendMySMS($newmobile, $sms);

            $response['error'] = false;
            $response['message'] = 'OTP Sent to '.$newmobile;
            echo json_encode($response);

        } else {
            $response['error'] = true;
            $response['message'] = 'Number Already Exist'.$newmobile;
            echo json_encode($response);
        }
    } else {
        unset($_SESSION['UserID']);
        $response['error'] = true;
        $response['message'] = 'User Doesn\'t Exist';
        echo json_encode($response);
        sleep(2);
        header("Location:../");
    }
}
if (isset($_POST['otpresend'])) {

    $regid = $_SESSION['UserID'];

    $query1 = "select Mobile,OTPCode from registration where UserID='$regid'";
    $res1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($res1, MYSQLI_BOTH);
    $mobile = $row1['Mobile'];
    $otp = $row1['OTPCode'];
    //echo $mobile;
    //echo $otp;
    $sms = "Your MobileM.in OTP Code is $otp.";
    $mob = $mobile;

    $smsresult = sendMySMS($mob, $sms);
    $response['error'] = false;
    $response['message'] = 'OTP Resent to '.$mob;
    echo json_encode($response);
    // sleep(2);
    // header("Location:../Verify-OTP.php?success=otpresend"); // otp  resend            

}
