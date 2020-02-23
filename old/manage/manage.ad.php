<?php
    session_start();
    require_once("manage.database.php");

    $flag=$_REQUEST['action'];

    
    date_default_timezone_set("Asia/Kolkata");

    switch($flag)
    {
        case "add":
            $name=$_POST["title"];
            $subname=$_POST["subtitle"];
            $category=$_POST["category"];
            $brand=$_POST["brand"];
            $status=$_POST["status"];
            $price=$_POST["price"];
            $location=$_POST["location"];
            $description=$_POST["description"];
            $city=$_POST["city"];
            $contact=$_POST["mobilenumber"];

            $image1name=$_FILES["image1"]["name"];
            $image1size=$_FILES["image1"]["size"];
            $image1type=$_FILES["image1"]["type"];
            $image1tmpname=$_FILES["image1"]["tmp_name"];

            $image2name=$_FILES["image2"]["name"];
            $image2size=$_FILES["image2"]["size"];
            $image2type=$_FILES["image2"]["type"];
            $image2tmpname=$_FILES["image2"]["tmp_name"];

            $image3name=$_FILES["image3"]["name"];
            $image3size=$_FILES["image3"]["size"];
            $image3type=$_FILES["image3"]["type"];
            $image3tmpname=$_FILES["image3"]["tmp_name"];

            $date=date("Y-m-d");
            
            $email=$_SESSION["LoginID"];

            $query="insert into ads(Title,SubTitle,Category,Brand,Status,Price,Location,Description,Image1,Image2,Image3,AddDate,Email,Contact,City) values('$name','$subname','$category','$brand','$status','$price','$location','$description','$image1name','$image2name','$image3name','$date','$email','$contact','$city')";

            $size1=$image1size/1024;
            $size2=$image2size/1024;
            $size3=$image3size/1024;

            $location="../adimg/";

            if($size1<=10000 && $size2<=10000 && $size3<=10000)
            {
                    if(mysqli_query($conn,$query))
                    {
                        move_uploaded_file($image1tmpname,$location.$image1name);
                        move_uploaded_file($image2tmpname,$location.$image2name);
                        move_uploaded_file($image3tmpname,$location.$image3name);

                        header("location:../MyAds.php?msg=added");
                    }
                    else
                    {
                        header("location:../UploadAd.php?msg=error"); // Query Error
                    }   

            }
            else
            {
                header("location:../UploadAd.php?msg=size"); // Image Size Error
            }
        break;
        
        case "del":
            
            $adid=$_REQUEST["adid"];
            $sql="select * from ads where AdID='$adid'";
            $res=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($res,MYSQLI_BOTH);
       
            $sql2="delete from ads where AdID='$adid'";
            if(mysqli_query($conn,$sql2))
            {
        
                header("Location:../MyAds.php?msg=deleted");
            }
            else
            {
                header("Location:../MyAds.php?msg=error");
            }
            
            break;
            
            
    }
?>