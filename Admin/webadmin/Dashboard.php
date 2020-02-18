<!DOCTYPE html>
<html lang="en">
<head>
    <title>DashBoard @ MobileM.in</title>

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
                        <h4 class="page-title">MobileM.in - Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">MobileM.in Admin</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><i class="ti-shopping-cart text-success"></i> <a class="text-danger" href="NewOrders.php">Order Received </a></h3>
						 <?php 
                        //include("../Admin/webadmin/manage.database.php");
						$date=date('Y-m-d');
				        $order1=0;
						$sel="select count(*) from orders where Date(date)='$date'";
						$query=mysqli_query($conn,$sel) or die('query error');
						while($row2=mysqli_fetch_array($query,MYSQLI_BOTH))
							{
								$order1=$row2[0];
							}
						?>					
                            <div class="text-right"><span class="text-muted">Todays Order</span>
                                <h1><sup><i class="ti-arrow-up text-success"></i></sup> 	<?php echo $order1;?></h1>
                            </div>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $order1;?>%;"> <span class="sr-only">  </span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
						 <?php  
					     
						$product=0;
						$sel="select count(OrderID) from  orders";
						$query=mysqli_query($conn,$sel) or die('query error');
						while($row2=mysqli_fetch_array($query,MYSQLI_BOTH))
							{
								$product=$row2[0];
							}
						?>
                            <h3 class="box-title"><i class="ti-cut text-danger"></i> <a class="text-danger" href="AllOrders.php">All Orders </a></h3>
                            <div class="text-right"> <span class="text-muted">
							Total Oreders </span>
                                <h1><sup><i class="ti-arrow-down text-danger"></i></sup> <?php echo $product;?></h1>
                            </div>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $product;?>%;"> <span class="sr-only"></span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
						 <?php  
					     
						$ads=0;
						$sel="select count(AdID) from ads";
						$query=mysqli_query($conn,$sel) or die('query error');
						while($row2=mysqli_fetch_array($query,MYSQLI_BOTH))
							{
								$ads=$row2[0];
							}
						?>
                            <h3 class="box-title"><i class="ti-wallet text-info"></i> <a class="text-danger" href="AllAds.php">All Ads</a></h3>
                            <div class="text-right"> <span class="text-muted">Old Phone Ads</span>
                                <h1><sup><i class="ti-arrow-up text-info"></i></sup> <?php echo $ads; ?></h1>
                            </div>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $ads; ?>%;"> <span class="sr-only"></span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
						 <?php  
					     
						$reg=0;
						$sel="select count(UserID) from  registration";
						$query=mysqli_query($conn,$sel) or die('query error');
						while($row2=mysqli_fetch_array($query,MYSQLI_BOTH))
							{
								$reg=$row2[0];
							}
						?>
                            <h3 class="box-title"><i class="ti-stats-up"></i> 
							<a class="text-danger" href="AllCustomers.php">Customers</a></h3>
                            <div class="text-right"> <span class="text-muted">Total Registered Customers</span>
                                <h1><sup><i class="ti-arrow-up text-inverse"></i></sup> <?php echo $reg;?></h1>
                            </div>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $reg;?>%;"> <span class="sr-only"></span> </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
						 <?php  
						$totalproduct=0;
						$sel="select count(ProductID) from  products";
						$query=mysqli_query($conn,$sel) or die('query error');
						while($row2=mysqli_fetch_array($query,MYSQLI_BOTH))
							{
								$totalproduct=$row2[0];
							}
						?>
                            <h3 class="box-title"><i class="ti-cut text-danger"></i> 
							<a class="text-danger" href="AllProduct.php">All Products</a></h3>
                            <div class="text-right"> <span class="text-muted">Total Products</span>
                                <h1><sup><i class="ti-arrow-up text-inverse"></i></sup> <?php echo $totalproduct;?></h1>
                            </div>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $totalproduct;?>%;"> <span class="sr-only"></span> </div>
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
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
