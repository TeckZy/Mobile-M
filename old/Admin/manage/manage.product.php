<?php
require_once("../../manage/manage.database.php");
date_default_timezone_set("Asia/Kolkata");
$action=$_REQUEST["action"];
switch($action)
{
 case "add":
        $name=$_POST["pname"];
        $subname=$_POST["psubname"];
        $category=$_POST["category"];
        $brand=$_POST["brand"];
        $status=$_POST["status"];
        $price=$_POST["price"];
        $discount=$_POST["discount"];
        $description=$_POST["description"];
        
        $image1name=$_FILES["image1"]["name"];
        $image1size=$_FILES["image1"]["size"];
        $image1type=$_FILES["image1"]["type"];
        $image1tmpname=$_FILES["image1"]["tmp_name"];
        //echo $image1name."<br/>";
        $image2name=$_FILES["image2"]["name"];
        $image2size=$_FILES["image2"]["size"];
        $image2type=$_FILES["image2"]["type"];
        $image2tmpname=$_FILES["image2"]["tmp_name"];
        //echo $image2name."<br/>";
        $image3name=$_FILES["image3"]["name"];
        $image3size=$_FILES["image3"]["size"];
        $image3type=$_FILES["image3"]["type"];
        $image3tmpname=$_FILES["image3"]["tmp_name"];
        //echo $image3name."<br/>";
		$image4name=$_FILES["image4"]["name"];
        $image4size=$_FILES["image4"]["size"];
        $image4type=$_FILES["image4"]["type"];
        $image4tmpname=$_FILES["image4"]["tmp_name"];
		//echo $image4name."<br/>";
		$image5name=$_FILES["image5"]["name"];
        $image5size=$_FILES["image5"]["size"];
        $image5type=$_FILES["image5"]["type"];
        $image5tmpname=$_FILES["image5"]["tmp_name"];
		//echo $image5name."<br/>";
		$image6name=$_FILES["image6"]["name"];
        $image6size=$_FILES["image6"]["size"];
        $image6type=$_FILES["image6"]["type"];
        $image6tmpname=$_FILES["image6"]["tmp_name"];
		//echo $image6name."<br/>";
		$image7name=$_FILES["image7"]["name"];
        $image7size=$_FILES["image7"]["size"];
        $image7type=$_FILES["image7"]["type"];
        $image7tmpname=$_FILES["image7"]["tmp_name"];
		//echo $image7name."<br/>";
	
        $date=date("Y-m-d");
        
     $query="insert into products(Name,SubName,Category,Brand,Status,Price,Discount,Description,Image1,Image2,Image3,image4,image5,image6,image7,AddDate) values('$name','$subname','$category','$brand','$status','$price','$discount','$description','$image1name','$image2name','$image3name','$image4name','$image5name','$image6name','$image7name','$date')";
        
        $size1=$image1size/1024;
        $size2=$image2size/1024;
        $size3=$image3size/1024;
        $size4=$image4size/1024;
        $size5=$image5size/1024;
        $size6=$image6size/1024;
        $size7=$image7size/1024;
        
        $location="../productsimg/";
        
        if($size1<=800 && $size2<=800 && $size3<=800 && $size4<=800 && $size5<=800 && $size6<=800 && $size7<=800)
        {
                if(mysqli_query($conn,$query))
                {
                    move_uploaded_file($image1tmpname,$location.$image1name);
                    move_uploaded_file($image2tmpname,$location.$image2name);
                    move_uploaded_file($image3tmpname,$location.$image3name);
                    move_uploaded_file($image4tmpname,$location.$image4name);
                    move_uploaded_file($image5tmpname,$location.$image5name);
                    move_uploaded_file($image6tmpname,$location.$image6name);
                    move_uploaded_file($image7tmpname,$location.$image7name);
                    
                    header("location:../webadmin/AddNewProduct.php?msg=added");
                }
                else
                {
                    header("location:../webadmin/AddNewProduct.php?msg=error"); // Query Error
                }   

        }
        else
        {
            header("location:../webadmin/AddNewProduct.php?msg=size"); // Image Size Error
        }
		
        break;

    case "edit":
        
        
        break;
		/*---------------------update--------------------------------*/
		
    case "update":
	    $pid=$_POST['pid'];
		//echo $pid;
		
        $name=$_POST["pname"];
        $subname=$_POST["psubname"];
        $category=$_POST["category"];
        $brand=$_POST["brand"];
        $status=$_POST["status"];
        $price=$_POST["price"];
        $discount=$_POST["discount"];
        //$description=$_POST["description"];
		//echo $description;
       
        $image1name=$_FILES["image1"]["name"];
        $image1size=$_FILES["image1"]["size"];
        $image1type=$_FILES["image1"]["type"];
        $image1tmpname=$_FILES["image1"]["tmp_name"];
        //echo $image1name."<br/>";
        $image2name=$_FILES["image2"]["name"];
        $image2size=$_FILES["image2"]["size"];
        $image2type=$_FILES["image2"]["type"];
        $image2tmpname=$_FILES["image2"]["tmp_name"];
        //echo $image2name."<br/>";
        $image3name=$_FILES["image3"]["name"];
        $image3size=$_FILES["image3"]["size"];
        $image3type=$_FILES["image3"]["type"];
        $image3tmpname=$_FILES["image3"]["tmp_name"];
		
        //echo $image3name."<br/>";
		$image4name=$_FILES["image4"]["name"];
        $image4size=$_FILES["image4"]["size"];
        $image4type=$_FILES["image4"]["type"];
        $image4tmpname=$_FILES["image4"]["tmp_name"];
		//echo $image4name."<br/>";
		$image5name=$_FILES["image5"]["name"];
        $image5size=$_FILES["image5"]["size"];
        $image5type=$_FILES["image5"]["type"];
        $image5tmpname=$_FILES["image5"]["tmp_name"];
		//echo $image5name."<br/>";
		$image6name=$_FILES["image6"]["name"];
        $image6size=$_FILES["image6"]["size"];
        $image6type=$_FILES["image6"]["type"];
        $image6tmpname=$_FILES["image6"]["tmp_name"];
		//echo $image6name."<br/>";
		$image7name=$_FILES["image7"]["name"];
        $image7size=$_FILES["image7"]["size"];
        $image7type=$_FILES["image7"]["type"];
        $image7tmpname=$_FILES["image7"]["tmp_name"];
		//echo $image7name."<br/>";
	    $date=date("Y-m-d");
	  /*  
		$del="select * from products where ProductID='$pid'";
		$query=mysqli_query($conn,$del) or die('Error');
		$row12=mysqli_fetch_array($query,MYSQLI_BOTH);
		
		$local1="../productsimg/".$row12['9'];
		//echo $local1;
		$local2="../productsimg/".$row12['10'];
		$local3="../productsimg/".$row12['11'];
		$local4="../productsimg/".$row12['12'];
		$local5="../productsimg/".$row12['13'];
		$local6="../productsimg/".$row12['14'];
		$local7="../productsimg/".$row12['15'];
	*/	

//Description='$description pass before images
     $query="update products  set Name='$name',SubName='$subname',Category='$category',Brand='$brand',Status='$status',Price='$price',Discount='$discount',Image1='$image1name',Image2='$image2name',Image3='$image3name',image4='$image4name',image5='$image5name',image6='$image6name',image7='$image7name',AddDate='$date' where ProductID='$pid'";
       $qq=mysqli_query($conn,$query) or die('Error'); 
        $size1=$image1size/1024;
        $size2=$image2size/1024;
        $size3=$image3size/1024;
        $size4=$image4size/1024;
        $size5=$image5size/1024;
        $size6=$image6size/1024;
        $size7=$image7size/1024;
        
        $location="../productsimg/";
        
        if($size1<=800 && $size2<=800 && $size3<=800 && $size4<=800 && $size5<=800 && $size6<=800 && $size7<=800)
        {
                if($qq)
                {
					/*
					unlink($local1);
					unlink($local2);
					unlink($local3);
					unlink($local4);
					unlink($local5);
					unlink($local6);
					unlink($local7);
					
                   */
				  
				  move_uploaded_file($image1tmpname,$location.$image1name);
                    move_uploaded_file($image2tmpname,$location.$image2name);
                    move_uploaded_file($image3tmpname,$location.$image3name);
                    move_uploaded_file($image4tmpname,$location.$image4name);
                    move_uploaded_file($image5tmpname,$location.$image5name);
                    move_uploaded_file($image6tmpname,$location.$image6name);
                    move_uploaded_file($image7tmpname,$location.$image7name);
       
           header("Location:../webadmin/AllProduct.php");			 
             
                }
                else
                {
             header("Location:../webadmin/AddNewProduct.php?msg=error"); // Query Error
                }   
        }
        else
        {
           header("Location:../webadmin/AddNewProduct.php?msg=size"); // Image Size Error
        }
	   
        break;
	
    case "del":
        
        $pid=$_REQUEST["rowid"];
		//echo $pid;
	
        $sql1="select * from products where productid='$pid'";
        $res1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_array($res1,MYSQL_BOTH);
        
        $image1=$row1["Image1"];
        $image2=$row1["Image2"];
        $image3=$row1["Image3"];
        $image4=$row1["Image4"];
        $image5=$row1["Image5"];
        $image6=$row1["Image6"];
        $image7=$row1["Image7"];
		
        $location1="../productsimg/".$image1;
        $location2="../productsimg/".$image2;
        $location3="../productsimg/".$image3;
        $location4="../productsimg/".$image4;
        $location5="../productsimg/".$image5;
        $location6="../productsimg/".$image6;
        $location7="../productsimg/".$image7;
        
        $sql2="delete from products where productid='$pid'";
        if(mysqli_query($conn,$sql2))
        {
            unlink($location1);
            unlink($location2);
            unlink($location3);
			unlink($location4);
            unlink($location5);
            unlink($location6);
            unlink($location7);
            header("Location:../webadmin/AllProduct.php?msg=deleted");
        }
        else
        {
            header("Location:../webadmin/AllProduct.php?msg=error");   
        }
	
        break;     
   case "newdel":
      $id=$_REQUEST['rowid'];
	  //echo $id;
	  $del="delete from orders where OrderId='$id'";
	  $q=mysqli_query($conn,$del) or die('Error');
	  if($q)
	  {
		  header('Location:../webadmin/NewOrders.php');
	  }
	  else
	  {
		  echo "<script>
		     alert('data not deleted');
			 window.location.href='../webadmin/NewOrders.php';
		      </script>";
	  }
break;

	
}
?>