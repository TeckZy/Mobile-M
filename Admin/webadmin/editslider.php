<?php 

$flag=$_REQUEST['flag'];
include('../../manage/manage.database.php');
switch($flag)
{
	case 1:
	  $imagename=$_FILES['image1']['name'];

	$tmp_name=$_FILES['image1']['tmp_name'];

	$location="../../images/slider/".$imagename;
	$date=date('Y-m-d');
	
	$insert="insert into slider(image,date) values('$imagename','$date')";
	$q=mysqli_query($conn,$insert) or die('Error');
	if($q)
	{
		move_uploaded_file($tmp_name,$location);
	   header('Location:slider.php');	
	}
	else
	{
		echo "<script>
		      alert('insertion failled');
			  window.location.href='slider.php';
		      </script>";
	}
     
	 
	break;
	
	case 2:
	$imagename=$_FILES['image1']['name'];
	$tmp_name=$_FILES['image1']['tmp_name'];
	$location="../../images/slider/".$imagename;
	$name=$_POST['name'];
	$date=date('Y-m-d');
	
	$insert="insert into bottomslider(image,caption,date) values('$imagename','$name','$date')";
	$q=mysqli_query($conn,$insert) or die('Error');
	if($q)
	{
		move_uploaded_file($tmp_name,$location);
	   header('Location:bottomslider.php');	
	}
	else
	{
		echo "<script>
		      alert('insertion failled');
			  window.location.href='bottomslider.php';
		      </script>";
	}
	break;
	
	case 3:
	   $id=$_REQUEST['id'];
	   //echo $id;
	   
	   $id=$_REQUEST['id'];
		$sel="select * from bottomslider where id='$id'";
		$qu=mysqli_query($conn,$sel) or die('Error');
		$row=mysqli_fetch_array($qu,MYSQLI_BOTH);
			 
		$image1=$row['1'];
		$location="../../images/slider/".$image1;

		$select="delete from bottomslider where id='$id'";
		$q=mysqli_query($conn,$select) or die('Error');
		if($q)
		{
			unlink($location);
			header('Location:bottomslider.php');
		}
		else
		{
			echo "<script>
				 alert('delete failled');
				 window.location.href='bottomslider.php';
				 </scritp>";
}
	   
	break;
}

?>