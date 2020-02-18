<?php
        require_once("manage.database.php");
        session_start();
        $email=$_SESSION['LoginID'];

        date_default_timezone_set("Asia/Kolkata");
		
	    $date=date("Y-m-d");
    	
    	$time=date("h:i:sa");
        $datetime=$date." ".$time;
        $st1="false";

        $query1="update login set LastLogoutDateTime='$datetime', CurrentStatus='$st1', CurrentLoginFrom='offline' where Email='$email'";
        if(mysqli_query($conn,$query1))
        {
            unset($_SESSION['LoginID']);
            session_destroy();
            header("Location:../");// Logout Success
        }
        else
        {
          echo mysqli_error($conn);
        }
?>