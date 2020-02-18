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
                            <div class="panel-heading"> Create New Acount</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="../manage/manage.category.php?action=createacount" method="post" >
                                        <div class="form-body">
                                           
											<div class="form-group">
                                                <label class="control-label">Enter email ID</label>
                                                <input type="email" id="cname" name="email" class="form-control" placeholder="Enter New Email ID">
                                            </div>
											<div class="form-group">
                                                <label class="control-label">Enter The Password</label>
                                                <input type="password" id="cname" name="password" class="form-control" placeholder="Enter the Password">
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
