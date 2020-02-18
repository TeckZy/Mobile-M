
<html>
	<head>
		<!-- Page Title -->
		<title>Order Summery @ MobileM.in</title>
		<!-- // Page Title -->
        
		<!-- Header Files -->
		
		<?php include('link.php'); ?>
		<?php
		include_once("Content/headerfiles.php");
		?>
		<!-- // Header Files -->
	

	</head>
	<body>
	    <!--header-->
	<?php include('header.php'); ?>
	<!--//header-->
		<!--  Main Container -->
		<div class="container-fluid">
           
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10" style="color:Tomato; font-size:50px;"> <h1>Your Order Summery </h1></div>
                <div class="col-sm-1"></div>
            </div>
            
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
		<?php
		$orderid=$_SESSION["OID"];
		//echo $orderid;
		$msg=$_REQUEST['msg'];
		//echo $msg;
		if(isset($_REQUEST['msg']) && $_REQUEST['msg']=="transactionsuccess")
		{
		?>
		<br/>
		<h3>Your Order Placed Successfully. Payment Received by MobileM Enterprises. <br/> Your Order ID is - <span class="label label-info"> <?php echo $orderid; ?></span>. Use this for further.</h3>
		<br/>
		<?php
		}
		$sql="select * from orders where OrderID='$orderid'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res,MYSQLI_BOTH);
		
		$sql1="select * from orderproduct where OrderID='$orderid'";
		$res1=mysqli_query($conn,$sql1);
		$sr=0;
		?>
			<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>Product ID</th>
					<th>Product Image</th>
					<th>Product Details</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
		<?php
		while($row1=mysqli_fetch_array($res1,MYSQLI_BOTH))
		{
			$sr++;
			?>
				<tr>
					<td> <?php echo $row1["ProductID"]; ?> </td>
					<?php
						$pid=$row1["ProductID"];
						$sql2="select * from products where ProductID='$pid'";
						$res2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_array($res2,MYSQLI_BOTH);
					?>
					<td> <img src="Admin/productsimg/<?php echo $row2['Image1']; ?>" class="img-responsive" style="height:100px;" /> </td>
					<td> 
						<b>Name : </b> <?php echo $row2['Name']; ?> <br/>
						<b>Category : </b> <?php echo $row2['Category']; ?> <br/>
						<b>Brand : </b> <?php echo $row2['Brand']; ?> 
					</td>
					<td> <?php echo $row1['Quantity']; ?> </td>
					<td>
						<?php
							if($row2["Discount"]>0)
							{
								$dis=$row2["Discount"];
								$price=$row2["Price"];
								$disprice=$dis/100*$price;
								$disprice=intval($disprice);
								$newprice=$price-$disprice;
							?>
							<span class="label label-danger" style="padding:3px 3px;"><?php echo $dis; ?> %</span>
							<s style="color:gray;"><i class="fa fa-rupee"></i> <?php echo $row2["Price"]; ?></s> &nbsp;&nbsp;
							<i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-                                             
							<?php
							}
							else
							{
							?>
							<i class="fa fa-rupee"></i> <?php echo $row2["Price"]; ?> /- 
							<?php
							}
						?>
					</td>
				</tr>						
			<?php
		}
		
		?>
			</table>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th colspan="2" >Delivery Address</th>
							</tr>
							<tr>
								<th> Name </th>
								<td> <?php echo $row["Name"]; ?> </td>
							</tr>
							<tr>
								<th> Mobile </th>
								<td> <?php echo $row["Mobile"]; ?> </td>
							</tr>
							<tr>
								<th> Email </th>
								<td> <?php echo $row["Email"]; ?> </td>
							</tr>
							<tr>
								<th> Email Alt </th>
								<td> <?php echo $row["EmailAlt"]; ?> </td>
							</tr>
							<tr>
								<th> Delivery City </th>
								<td> <?php echo $row["City"]; ?> </td>
							</tr>
							<tr>
								<th> Delivery Address </th>
								<td> <?php echo $row["Address"]; ?> </td>
							</tr>
							<tr>
								<th> Delivery Pincode </th>
								<td> <?php echo $row["Pincode"]; ?> </td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th colspan="2" >Payment Details</th>
							</tr>
							<tr>
								<th>Subtotal</th>
								<td> <i class="fa fa-rupee"></i> <?php echo $row["SubTotal"]; ?> </td>
							</tr>
							<tr>
								<th>Delivery Charge</th>
								<td> <i class="fa fa-rupee"></i> <?php echo $row["DeliveryCharge"]; ?> </td>
							</tr>
							<tr>
								<th>Tax</th>
								<td> <i class="fa fa-rupee"></i> <?php echo $row["Tax"]; ?> </td>
							</tr>
							<tr>
								<th>Total Amount</th>
								<td> <i class="fa fa-rupee"></i> <?php echo $row["TotalCharge"]; ?> </td>
							</tr>
							<tr>
								<th>Status</th>
								<td align="center">
											<?php if($row['StatusByCustomer']=="true"){ ?>
												<span class="label label-success font-weight-100">Order Placed</span>
												
											<?php	} else { ?>
											<span class="label label-warning font-weight-100">Order InComplete</span>
											<?php } ?>
											
											<?php if($row['PaymentStatus']=="true"){ ?>
												<span class="label label-success font-weight-100">Payment Received</span>
												
											<?php	} else { ?>
											<span class="label label-danger font-weight-100">Payment NOT Received</span> 
											
											<?php } ?>
											<?php if($row['StatusByAdmin']=="false"){ ?>
												<span class="label label-warning font-weight-100">Pending By Admin</span> 
											
											<?php	} ?>								
											<?php if($row['DeliveryStatus']=="true"){ ?>
												<span class="label label-success font-weight-100">Order Delivered</span>
											<?php	} else if($row["StatusByAdmin"]=="true") { ?>
												<span class="label label-info font-weight-100">Order In Process</span>
											<?php } ?>
									
								</td>
							</tr>
							<tr>
								<th>Payment ID</th>
								<td> <?php echo $row["PaymentID"]; ?> </td>
							</tr>
							
						</table>
					</div>
				</div>
			</div>
			
					
					
				</div>
				<div class="col-sm-1"></div>
			</div>
            
            <?php
                include_once("footer1.php");
            ?>
            
            
		</div>
		<!--  // Main Container -->
	</body>
</html>