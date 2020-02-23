<?php
        require_once("../../manage/manage.database.php");

        session_start();

        $email=$_SESSION['AdminID'];

        date_default_timezone_set("Asia/Kolkata");
		
	    $date=date("Y-m-d");
    	
    	$time=date("h:i:sa");
        $datetime=$date." ".$time;
        $st1="false";

        $query1="update admin set LastLogoutDateTime='$datetime', CurrentStatus='$st1', CurrentLoginFrom='offline' where Email='$userid'";
        if(mysqli_query($conn,$query1))
        {
            unset($_SESSION['AdminID']);
            session_destroy();
            header("Location:../index.php?success=logout"); // Logout Success
        }
        else
        {
            header("Location:../index.php?error=logout"); // Logout Failed
        }
?>