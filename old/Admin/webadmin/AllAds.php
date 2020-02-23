<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Ads @ MobileM.in</title>
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
                        <h4 class="page-title">All Ads</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">MobileM.in Admin</a></li>
                            <li class="active">All Ads</li>
                        </ol>
                    </div>
                </div>
                
                <!-- Page Content Goes Here -->
                
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">All Ads</h3>
                            <div class="table-responsive">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $olddate=date('Y-m-d', strtotime('-30 days'));
                                            $today=date('Y-m-d');
                                        
                                            $sql="select * from ads order by AdID desc";
                                            if(isset($_REQUEST["type"]))
                                            {
                                                if($_REQUEST["type"]=="running")
                                                {
                                                    $sql="select * from ads where AddDate between '$olddate' and '$today' order by AdID desc";
                                                }
                                                else if($_REQUEST["type"]=="outdated")
                                                {
                                                    $sql="select * from ads where AddDate<'$olddate' order by AdID desc ";
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
                                            <td> <?php echo $row['Title']; ?> <br/> <?php echo $row['SubTitle']; ?></td>
                                            <td> <?php echo $row['Category']; ?> <br/> <?php echo $row['Brand']; ?></td>
                                            <td> <i class="fa fa-rupee"></i> <?php echo $row['Price']; ?> <br/> <?php echo $row['Location']; ?></td>
                                            <td> <?php echo $row["Description"]; ?> </td>
                                            <td>
                                                <img src="../../adimg/<?php echo $row['Image1']; ?>" style="height:80px;" alt="iMac" class="img-responsive" >
                                            </td>
                                            <td> <?php echo $row['Email']; ?> <br/> <?php echo $row['Contact']; ?></td>
                                            <td> <?php echo $row["City"]; ?> <br/> <?php echo $row["AddDate"]; ?>  </td>
                                            
                                            <td>
                                                <a href="../manage/manage.php?action=addel&adid=<?php echo $row['AdID']; ?>" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
    
    <?php
        include_once("../Content/footerlink.php");
    ?>
    
</body>

</html>
