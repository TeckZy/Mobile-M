<?php 
include('../../manage/manage.database.php');

$id=$_REQUEST['id'];
//echo $id;

$ss22="delete from contact where ID='$id'";
$q=mysqli_query($conn,$ss22)or die('Error');	

if($q)
{
	header('location:contact-Us.php?sms=successfully');
}
else
{
	header('location:contact-Us.php?sms=Error');
}

?>