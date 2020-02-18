<!DOCTYPE html>
<html lang="en">

<head>
<script>
function deleterow(OrderID)
{
	//alert(OrderID);
	var a=confirm('are you sure want to delete?');
	if(a==true)
	{
		$.ajax({
			    url:"../manage/manage.php?action=orderdel",
					   type:"POST",
					   data:{rowid:OrderID},
					   success:function(res){
						  alert("data delete successfully");
					   },
					   error:function(){
						   //alert("error");
					   }
		})
	}
}
</script>
    <title>All Orders @ MobileM.in</title>
    <?php
        include_once("../Content/headerlink.php");
    ?>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <?php
            include_once("../Content/navbar.php");
        ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">All Orders</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">MobileM.in Admin</a></li>
                            <li class="active">All Orders</li>
                        </ol>
                    </div>
                </div>
                
                <!-- Page Content Goes Here -->
                
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">All Products</h3>
                            <div class="table-responsive">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Email</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="select * from orders order by OrderID desc";
										
										if(isset($_REQUEST["type"]))
										{
											if($_REQUEST["type"]=="new")
											{
												$sql="select * from orders where StatusByAdmin='false' order by OrderID desc";
											}
											else if($_REQUEST["type"]=="inprocess")
											{
												$sql="select * from orders where StatusByAdmin='true' and DeliveryStatus='false' order by OrderID desc";
											}
											else if($_REQUEST["type"]=="delivered")
											{
												$sql="select * from orders where DeliveryStatus='true' order by OrderID desc";
											}
										}
										
                                        $res=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $row["OrderID"]; ?></td>
                                            <td><?php echo $row["Email"]; ?></td>
                                            <td> 
                                                <b>Name : </b> <?php echo $row["Name"]; ?><br/>
                                                <b>Mobile : </b> <?php echo $row["Mobile"]; ?><br/>
                                                <b>Email Alt : </b> <?php echo $row["EmailAlt"]; ?>
                                            </td>
											<td> 
                                                <b>Sub Total : </b> <i class="fa fa-rupee"></i> <?php echo $row["SubTotal"]; ?><br/>
                                                <b>Delivery Charge: </b> <i class="fa fa-rupee"></i> <?php echo $row["DeliveryCharge"]; ?><br/>
                                                <b>Tex : </b> <i class="fa fa-rupee"></i> <?php echo $row["Tax"]; ?><br/>
                                                <u><b>Total Amount : </b> <i class="fa fa-rupee"></i> <?php echo $row["TotalCharge"]; ?></u>
                                            </td>
                                            <td>
											<?php if($row['StatusByCustomer']=="true"){ ?>
												<span class="label label-success font-weight-100">Order Placed</span>
												<br/><br/>
											<?php	} else { ?>
											<span class="label label-warning font-weight-100">Order InComplete</span><br/><br/>
											<?php } ?>
											
											<?php if($row['PaymentStatus']=="true"){ ?>
												<span class="label label-success font-weight-100">Payment Received</span>
												<br/><br/>
											<?php	} else { ?>
											<span class="label label-danger font-weight-100">Payment NOT Received</span> 
											<br/><br/>
											<?php } ?>
											<?php if($row['StatusByAdmin']=="false"){ ?>
												<span class="label label-warning font-weight-100">Pending By Admin</span> 
											<br/><br/>	
											<?php	} ?>								
											<?php if($row['DeliveryStatus']=="true"){ ?>
												<span class="label label-success font-weight-100">Order Delivered</span><br/><br/>
											<?php	} else if($row["StatusByAdmin"]=="true") { ?>
												<span class="label label-info font-weight-100">Order In Process</span>
											<?php } ?>
									
											
												
                                            </td>
											<td> <?php echo $row["Date"]; ?> <br/> <?php echo $row["Time"]; ?> </td>
                                            <td>
											
                                                <a href="javascript:void(0)" onclick="showfulldetails(<?php echo $row["OrderID"]; ?>)" class="text-inverse p-r-10" data-toggle="tooltip" title="View Full Details"><i class="fa fa-eye"></i></a>
												<?php if($row["StatusByAdmin"]=="false") { ?>
                                                <a href="../manage/manage.php?action=orderstatus&to=process&oid=<?php echo $row["OrderID"]; ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Process Order"><i class="fa fa-sign-out"></i></a>
												<?php } else if($row["DeliveryStatus"]=="false") { ?>
                                                <a href="../manage/manage.php?action=orderstatus&to=delivered&oid=<?php echo $row["OrderID"]; ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Delivered Order "><i style="color:blue;" class="fa fa-sign-out"></i></a>
												<?php } else { ?>
												<a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Order Delivered"><i style="color:red;" class="fa fa-sign-out"></i></a>
												<?php } ?>
                                                <a href="javascript:(void);" onclick="deleterow(<?php echo $row["OrderID"];?>)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
												
											</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; MobileM.in  || Powered By - <a href="http://www.pnpintech.com">PNPLRC Pvt. Ltd.</a> </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
	
	
	
	<div class="modal fade" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body" >
				
				
				
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>
	
	
    <?php
        include_once("../Content/footerlink.php");
    ?>
	
	<div class="modal fade bs-example-modal-lg" >
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" style="margin-top:450px;">
			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myLargeModalLabel">Order Products (User Cart)</h4>
			</div>
			<div class="modal-body" id="modalbody">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
	</div>

	<script>
		function showfulldetails(oid)
		{
			$.ajax({
				url:"../manage/manage.php?action=orderview",
				type:"POST",
				data:{orderid:oid},
				success:function(res){
					$(".bs-example-modal-lg").modal("show");
					$("#modalbody").html(res);
				},
				error:function(){}
			});
		}
	</script>
	
</body>

</html>
