<!DOCTYPE html>
<html lang="en">

<head>
<script>
function deleterow(ProductID)
	    {
			//alert(ProductID);
		  var a=confirm("are you sure want to delete");
		  if(a==true)
		  {
			  $.ajax({
				       url:"../manage/manage.product.php?action=del&pid",
					   type:"POST",
					   data:{rowid:ProductID},
					   success:function(res){
						  
					   },
					   error:function(){
						   //alert("error");
					   }
					});
		  } 
	  }
</script>	
    <title>All Products @ MobileM.in</title>
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
                        <h4 class="page-title">All Products</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">MobileM Admin</a></li>
                            <li class="active">All Products</li>
                        </ol>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">All Products</h3>
                            <div class="table-responsive">
                                <table class="table product-overview">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Image 1</th>
                                            <th>Image 2</th>
                                            <th>Image 3</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $sql="select * from products order by ProductID desc";
                                            
                                            if(isset($_REQUEST["type"]))
                                            {
                                                if($_REQUEST["type"]=="instock")
                                                {
                                                    $sql="select * from products where Status='In-Stock' order by ProductID desc";
                                                }
                                                else if($_REQUEST["type"]=="outofstock")
                                                {
                                                    $sql="select * from products where Status='Out-of-Stock' order by ProductID desc";
                                                }
                                            }
                                        
                                            $res=mysqli_query($conn,$sql);
                                            while($row=mysqli_fetch_array($res,MYSQL_BOTH))
                                            {
								$ct=$row["Category"];
								$s="select * from category where CategoryID='$ct'";
								$pp=mysqli_query($conn,$s);
								$row4=mysqli_fetch_array($pp,MYSQL_BOTH);
												
                                        ?>
                                        <tr>
                                            <td> <?php echo $row["ProductID"]; ?> </td>
                                            <td> <?php echo $row["Name"]; ?> <br/> <small><?php echo $row["SubName"]; ?></small>  </td>
                                            <td> <?php echo $row4[1];  ?> 
											</td>
                                            <td> <?php echo $row["Brand"]; ?> </td>
                                            <td>
                                                <?php
                                                if($row["Status"]=="In-Stock")
                                                {
                                                ?>
                                                <span class="label label-info font-weight-100">In-Stock</span> 
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <span class="label label-danger font-weight-100">Out-of-Stock</span> 
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <i class="fa fa-rupee"></i> <?php echo $row["Price"]; ?>
                                            </td>
                                            <td>
                     <img src="../productsimg/<?php echo $row["Image1"]; ?>" class="img-responsive" style="height:60px;">
                                            </td>
											                        <td>
                     <img src="../productsimg/<?php echo $row["Image2"]; ?>" class="img-responsive" style="height:60px;">
                                            </td>
											                        <td>
                     <img src="../productsimg/<?php echo $row["Image3"]; ?>" class="img-responsive" style="height:60px;">
                                            </td>
                                            <td>
                                             <a href="editAddNewProduct.php?pid=<?php echo $row["ProductID"]; ?>" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit"><i class="ti-marker-alt"></i>
											 </a>
											 
                                                <a href="javascript:(void);"onclick="deleterow(<?php echo $row["ProductID"]; ?>)" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="ti-trash"></i>
											   </a>
											  
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
