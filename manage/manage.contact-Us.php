<?php 
include('manage.database.php');
$name=$_POST['name'];
//echo $name."<br/>";

$email=$_POST['email'];
//echo $email."<br/>";

$subject=$_POST['subject'];
//echo $subject."<br/>";

$address=$_POST['address'];
//echo $address."<br/>";

$date=date('Y-m-d');
date_default_timezone_set('asia/kolkata');
$time=date('h:i:sa');

$datetime=$date." ".$time;
//echo $datetime."<br/>";

$s1="insert into contact(Name,Email,Subject,Address,Date) values('$name','$email','$subject','$address','$datetime')";

$query=mysqli_query($conn,$s1) or die('Error');

if($query)
{
	echo "<script>
	      alert('Insertion successfully');
		  window.location.href='../contact.php';
		  </script>";
}
else
{
	
	echo "<script>
	      alert('access denie');
		  window.location.href='../contact.php';
		  </script>";
}

?>