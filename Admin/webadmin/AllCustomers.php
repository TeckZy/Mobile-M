<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>All Customer @ MobileM.in</title>
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
                        <h4 class="page-title">All Customers</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">MobileM.in Admin</a></li>
                            <li class="active">All Customers</li>
                        </ol>
                    </div>
                </div>
                
                <!-- Page Content Goes Here -->
                
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">All Customers </h3>
                            <div class="table-responsive">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Date Time</th>
                                            <th>Verification</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $sql="select * from registration";
                                        
                                        if(isset($_REQUEST["type"]))
                                        {
                                            if($_REQUEST["type"]=="unverified")
                                            {
                                                $sql="select * from registration where OTPStatus='false'";
                                            }
                                        }
                                        
                                        $res=mysqli_query($conn,$sql);
                                        $sr=0;
                                        while($row=mysqli_fetch_array($res,MYSQL_BOTH))
                                        {
                                            $sr++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td><?php echo $row["Name"]; ?></td>
                                            <td>
                                                <?php echo $row["Mobile"]; ?>
                                            </td>
                                            <td><?php echo $row["Email"]; ?></td>
                                            <td><?php echo $row["Gender"]; ?></td>
                                            <td> <?php echo $row["Date"]; ?></td>
                                            <td>
                                                <?php if($row["OTPStatus"]=="true") {?>
                                                <span class="label label-success font-weight-100">OTP Verified</span>
                                                <?php } else { ?>
                                                <span class="label label-danger font-weight-100">OTP Unverified</span>
                                                <?php } ?>
                                            </td>
                                            <td>
            <a href="../manage/manage.php?action=customerdel&cid=<?php echo $row["UserID"]; ?>" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
