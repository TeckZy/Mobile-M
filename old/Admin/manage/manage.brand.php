<?php

require_once("../../manage/manage.database.php");
date_default_timezone_set("Asia/Kolkata");
$action=$_REQUEST["action"];
switch($action)
{
    case "add":
        
        $bname=$_POST["bname"];
        $date=date("Y-m-d");
        $status="true";
        
        $logoname=$_FILES["logobrand"]["name"];
        $logotype=$_FILES["logobrand"]["type"];
        $logosize=$_FILES["logobrand"]["size"];
        $logotmpname=$_FILES["logobrand"]["tmp_name"];
        $location="../brand/".$logoname;
        
        if($logotype=="image/png" || $logotype=="image/jpeg" || $logotype=="image/jpg")
        {
            $sql="insert into brand(BrandName,BrandLogo,Status,Date) values('$bname','$logoname','$status','$date')";
            if(mysqli_query($conn,$sql))
            {
                move_uploaded_file($logotmpname,$location);
                header("location:../webadmin/Brands.php?msg=added");
            }
            else
            {
                header("location:../webadmin/Brands.php?msg=error");
            }    
        }
        else
        {
            header("location:../webadmin/Brands.php?msg=logotypeinvalid");
        }
        
        
        break;
    case "del":
        $bid=$_REQUEST["bid"];
        
        $sql1="select * from brand where BrandID='$bid'";
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($res1,MYSQL_BOTH);
        
        $logo=$row1["BrandLogo"];
        
        $location="../brand/".$logo;
        
        $sql="delete from brand where BrandID='$bid'";
        if(mysqli_query($conn,$sql))
        {
            unlink($location);
            header("location:../webadmin/Brands.php?msg=deleted");
        }
        else
        {
            header("location:../webadmin/Brands.php?msg=error");
        }
        
        
        break;
        
}

?>