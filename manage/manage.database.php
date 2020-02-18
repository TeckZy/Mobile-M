<?php

//$hostname="localhost";
//$username="root";
//$password="";
//$dbname="mobilem_db";
$conn=mysqli_connect("localhost:3306","root","","mobilem_db");


if(!$conn)
{
	die("Connection Failed : ".mysqli_connect_error());
}
else
{
	//echo "connection OK";
}



?>