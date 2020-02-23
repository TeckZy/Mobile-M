<?php 
$id=$_REQUEST['id'];
//echo $id;
include('../../manage/manage.database.php');

$sel="select * from slider where id='$id'";
$qu=mysqli_query($conn,$sel) or die('Error');
$row=mysqli_fetch_array($qu,MYSQLI_BOTH);
     
	 $image1=$row['1'];
	 $location="../../images/slider/".$image1;

$select="delete from slider where id='$id'";
$q=mysqli_query($conn,$select) or die('Error');
if($q)
{
	unlink($location);
	header('location:slider.php');
}
else
{
	echo "<script>
	     alert('delete failled');
		 window.location.href='slider.php';
		 </scritp>";
}
?>