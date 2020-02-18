<?php

require_once("../../manage/manage.database.php");
date_default_timezone_set("Asia/Kolkata");
$action=$_REQUEST["action"];
switch($action)
{
    case "customerdel":
        $cid=$_REQUEST["cid"];
        
		$s1="select * from registration where UserID='$cid'";
		$qq12=mysqli_query($conn,$s1) or die('Error');
		$row=mysqli_fetch_array($qq12,MYSQLI_BOTH);
		$ee=$row['Email'];
		 
		$sss="delete from login where Email='$ee'";
        mysqli_query($conn,$sss);	
     
        $sql="delete from registration where UserID='$cid'";
        echo $sql;
        if(mysqli_query($conn,$sql))
        {
        header("location:../webadmin/AllCustomers.php?msg=deleted");
        }
        else
        {
       header("location:../webadmin/AllCustomers.php?msg=deleteerror");
        }
       
        break;
    case "addel":
        
        $adid=$_REQUEST["adid"];
		
        $sql="select * from ads where AdID='$adid'";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($res,MYSQLI_BOTH);

        $image1=$row["Image1"];
        $image2=$row["Image2"];
        $image3=$row["Image3"];

        $location1="../../adimg/".$image1;
        $location2="../../adimg/".$image2;
        $location3="../../adimg/".$image3;
         
        $sql2="delete from ads where AdID='$adid'";
        if(mysqli_query($conn,$sql2))
        {
            unlink($location1);
            unlink($location2);
            unlink($location3);
            header("location:../webadmin/AllAds.php?msg=deleted");
        }
        else
        {
            header("location:../webadmin/AllAds.php?msg=error");
        }

        
        break;
		
		
	case "orderview":
	
		$oid=$_POST["orderid"];
		// echo $oid;
		
		$sql="select * from orders where OrderID='$oid'";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($res,MYSQL_BOTH);
		
		$sql1="select * from orderproduct where OrderID='$oid'";
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
		while($row1=mysqli_fetch_array($res1,MYSQL_BOTH))
		{
			$sr++;
			?>
				<tr>
					<td> <?php echo $row1["ProductID"]; ?> </td>
					<?php
						$pid=$row1["ProductID"];
						$sql2="select * from products where ProductID='$pid'";
						$res2=mysqli_query($conn,$sql2);
						$row2=mysqli_fetch_array($res2,MYSQL_BOTH);
					?>
					<td> <img src="../productsimg/<?php echo $row2['Image1']; ?>" class="img-responsive" style="height:100px;" /> </td>
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
							<tr>
								<th>Payment Request ID</th>
								<td> <?php echo $row["PaymentReqID"]; ?> </td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th colspan="7"> Other Details </th>
							</tr>
							<tr>
								<th>Order From</th>
								<th>MAC</th>
								<th>IP</th>
								<th>Browser</th>
								<th>OS</th>
								<th>UserName</th>
								<th>Date Time</th>
							</tr>
							<tr>
								<?php
									$oid=$row["OrderID"];
									$sql3="select * from ordertracing where OrderID='$oid'";
									$res3=mysqli_query($conn,$sql3);
									$row3=mysqli_fetch_array($res3,MYSQL_BOTH);
								?>
								<td> <?php echo $row3["OrderFrom"]; ?> </td>
								<td> <?php echo $row3["Mac"]; ?> </td>
								<td> <?php echo $row3["IP"]; ?> </td>
								<td> <?php echo $row3["Browser"]; ?> </td>
								<td> <?php echo $row3["OS"]; ?> </td>
								<td> <?php echo $row3["UserName"]; ?> </td>
								<td> <?php echo $row3["Date"]."  ".$row3["Time"]; ?> </td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		<?php
		
		
	break;
	
	case "orderdel":
	
		$oid=$_REQUEST["rowid"];
	
		
		$sql1="delete from orders where OrderID='$oid'";
		$sql2="delete from orderproduct where OrderID='$oid'";
		$sql3="delete from ordertracing where OrderID='$oid'";
		
		if(mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2) && mysqli_query($conn,$sql3))
		{
			header("Location:../webadmin/AllOrders.php?msg=deleted");
		}
		else
		{
			header("Location:../webadmin/AllOrders.php?msg=deleteerror");
		}
	
	break;
	case "orderstatus":
	
		$oid=$_REQUEST["oid"];
		$to=$_REQUEST["to"];
		
		if($to=="process")
		{
			$sql1="update orders set StatusByAdmin='true' where OrderID='$oid'";
			if(mysqli_query($conn,$sql1))
			{
				header("Location:../webadmin/AllOrders.php?msg=process");
			}
			else
			{
				header("Location:../webadmin/AllOrders.php?msg=processerror");
			}
		}
		else if($to=="delivered")
		{
			$sql2="update orders set StatusByAdmin='true', DeliveryStatus='true' where OrderID='$oid'";
			if(mysqli_query($conn,$sql2))
			{
				header("Location:../webadmin/AllOrders.php?msg=delivered");
			}
			else
			{
				header("Location:../webadmin/AllOrders.php?msg=deliverederror");
			}
		}
		else
		{
			header("Location:../webadmin/AllOrders.php");
		}
	
	break;
	
}

?>





