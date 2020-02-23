<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Category @ MobileM.in</title>
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
                        <h4 class="page-title">All Category</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#"> MobileM Admin </a></li>
                            <li class="active">Category</li>
                        </ol>
                    </div>
                </div>
                <!-- Page Content Goes Here -->
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Add Category</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="../manage/manage.category.php?action=add" method="post" >
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label">Category Name</label>
                                                <input type="text" id="cname" name="cname" class="form-control" placeholder="Like Smart Phones or Tablet">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" > Save </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                 <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">All Categories</h3>
                            <div class="table-responsive">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="select * from category order by CategoryID desc";
                                        $res=mysqli_query($conn,$sql);
                                        $sr=0;
                                        while($row=mysqli_fetch_array($res,MYSQL_BOTH))
                                        {
                                            $sr++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td><?php echo $row["CategoryName"]; ?></td>
                                            <td><?php echo $row["Date"] ?></td>
                                            <td>
                                                <?php if($row["Status"]=="true") { ?>
                                                <span class="label label-success font-weight-100">Active</span>
                                                <?php } else { ?>
                                                <span class="label label-danger font-weight-100">In-Active</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a href="../manage/manage.category.php?action=del&cid=<?php echo $row['CategoryID']; ?>" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i></a>
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
        include("../Content/footerlink.php");
    ?>
</body>

</html>
