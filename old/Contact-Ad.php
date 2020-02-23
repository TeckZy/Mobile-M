
<!DOCTYPE html>
<html>
<head>
<?php 

include('link.php');

 ?>
<!--//end-smooth-scrolling-->
</head>
<body>	
	  <?php
        $adid="";
        if(isset($_REQUEST["adid"]))
        {
            $adid=$_REQUEST["adid"];
        }
        else
        {
            header("location:AllAds");
        }
        ?>

	<!--header-->
	<?php include('header.php');?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Add Contact Details</li>
			</ol>
		</div>
	</div>
	 <?php
            
            $sql1="select * from ads where AdID='$adid'";
            $res1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($res1,MYSQLI_BOTH);
            
            $cemail=$row1["Email"];
            
            $sql2="select * from registration where Email='$cemail'";
            $res2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($res2,MYSQLI_BOTH);
                            
            ?>
            
            <div class="row">
			<div class="col-sm-12">
                <div class="col-sm-2"></div>
                <div class="col-sm-7">
                    <p style="font-size:25px; color:tomato; text-shadow:1px 1px black;"> Customer Contact Details </p><hr/>
                    <div class="table-responsive">
					  <table class="table table-bordered">
					    <tr style="color:tomato;">
						   <th><h3>&nbsp; &nbsp; &nbsp; image </h3></th>
						   <th><h3>Customer Details </h3></th>
						</tr>
						
						<tr>
						  <td>  <img  src="adimg/<?php echo $row1["Image1"]; ?>" style="height:200px; text-align:center; width:250px;"/></td>
						  <td>
						   <p style="font-size:20px; "> 
					    <u>Seller Name -</u> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row2["Name"]; ?><br/>
                        <u>Seller Email -</u> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row2["Email"]; ?><br/>
                        <u>Seller Contact -</u> &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<?php echo $row2["Mobile"]; ?><br/>
                        <u>Seller Alt Contact -</u>&nbsp; &nbsp; &nbsp;<?php echo $row1["Contact"]; ?><br/>
                        <u>Seller City -</u>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<?php echo $row1["City"]; ?><br/>
                        <u>Seller Location -</u> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row1["Location"]; ?></p>
						  </td>
						</tr>
                   
						</table>
				    </div>		
                    
                </div>
                <div class="col-sm-3"></div>
            </div>
            </div>
			<br/>
			<br/>
	<!--footer-->
<?php  include('footer1.php');?>
</body>
</html>