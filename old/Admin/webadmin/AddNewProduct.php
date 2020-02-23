<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add New Product @ MobileM.in</title>
    
    <?php
        include_once("../Content/headerlink.php");
    ?>
    
</head>
<body>
    <?php
    if(isset($_REQUEST["msg"]))
    {
        $msg=$_REQUEST["msg"];
        if($msg=="added")
        {
            echo "<script>alert('Product Added Successfully')</script>";
        }
        if($msg=="error")
        {
            echo "<script>alert('Some technical Error. Please try again or contact your service provider.')</script>";
        }
        if($msg=="size")
        {
            echo "<script>alert('Product NOT Added. Image size Invalid. Please Upload only each file less than 500KB')</script>";
        }
    }
    ?>    
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
                        <h4 class="page-title">Add New Product</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">MobileM Admin</a></li>
                            <li class="active">Add New Product</li>
                        </ol>
                    </div>
                </div>
                <!-- Page Content Goes Here -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Add Product</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form onsubmit="return addproduct()" action="../manage/manage.product.php?action=add" method="post" enctype="multipart/form-data" >
                                        <div class="form-body">
                                            <h3 class="box-title">About Product</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Product Name</label>
                                 <input type="text" id="pname" name="pname" class="form-control" placeholder="Enter Product Name Minimum 40 character" /> </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
												
                                                        <label class="control-label">Sub Text</label>
										
                                  <input type="text" id="psubname" name="psubname" class="form-control" placeholder="Products Title Minimum 40 character"> </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Category</label>
                                                        <select class="form-control" name="category" data-placeholder="Choose a Category" tabindex="1">
                                                            <option value="">--Select Category--</option>
                                                            <?php
                                                            $query1="select * from category order by CategoryID desc";
                                                            $res1=mysqli_query($conn,$query1);
                                                            while($row1=mysqli_fetch_array($res1,MYSQLI_BOTH))
                                                            {
                                                            ?>
                                                            <option value="<?php echo $row1['0']; ?>"><?php echo $row1['CategoryName']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Brand</label>
                                                        <select class="form-control" name="brand" data-placeholder="Choose a Category" tabindex="1">
                                                            <option value="">--Select Brand--</option>
                                                            <?php
                                                            $query2="select * from brand order by BrandID desc";
                                                            $res2=mysqli_query($conn,$query2);
                                                            while($row2=mysqli_fetch_array($res2,MYSQLI_BOTH))
                                                            {
                                                            ?>
                                                            <option value="<?php echo $row2['BrandName']; ?>"><?php echo $row2['BrandName']; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline p-0">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" checked name="status" id="radio1" value="In-Stock">
                                                                    <label for="radio1">In Stock</label>
                                                                </div>
                                                            </label>
                                                            <label class="radio-inline">
                                                                <div class="radio radio-info">
                                                                    <input type="radio" name="status" id="radio2" value="Out-Of-Stock">
                                                                    <label for="radio2">Out of Stock</label>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fa fa-rupee"></i></div>
                                                            <input type="text" name="price" class="form-control" id="price" placeholder="153"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Discount</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                            <input type="text" name="discount" class="form-control" id="discount" placeholder="In Percentage.. ex - 10"> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            
                                            <h3 class="box-title m-t-40">Product Description</h3>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <textarea id="desc" name="desc"></textarea>
                                                        <input type="hidden" id="description" name="description" />
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <!--/row-->
                                            <div class="row">
										
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Product Image 1</label>
                                                        <input type="file" name="image1" class="form-control" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Product Image 2</label>
                                                        <input type="file" name="image2" class="form-control" required >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Product Image 3</label>
                                                        <input type="file" name="image3" class="form-control" required >
                                                    </div>
                                                </div>
												
												<div class="col-md-4">
                                                    <div class="form-group">
                                                     
                                                        <input type="hidden" name="image4" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                       
                                                        <input type="hidden" name="image5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                       
                                                        <input type="hidden" name="image6" class="form-control">
                                                    </div>
                                                </div>
												 <div class="col-md-4">
                                                    <div class="form-group">
                                                       
                                                        <input type="hidden" name="image7" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr> </div>
                                        <div class="form-actions m-t-40">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <a href="#" class="btn btn-default">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 
                2017 &copy; MobileM.in  || 
                Powered By - <a href="http://www.pnpintech.com">PNPLRC Pvt. Ltd.</a> 
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    
    <?php
        include_once("../Content/footerlink.php");
    ?>
    <script>
        $(document).ready(function(){
            
            $("#desc").Editor();
            
        });
        function addproduct()
        {
            var a=$("#desc").Editor('getText');
            $("#description").val(a);
            if($("#description").val()=="")
            {
                return false;        
            }
            else
            {
                return true;
            }
        }
    </script>
</body>

</html>
