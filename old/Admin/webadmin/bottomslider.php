<!DOCTYPE html>
<html lang="en">
<head>	
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
                        <h4 class="page-title">Slider</h4>
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
                            <div class="panel panel-default">
							<div class="panel-heading">
							  <h1></h1>
							</div>
							   <div class="panel-body">
							      <form class="form" action="editslider.php?flag=2" method="post" enctype="multipart/form-data">
								     <div class="form-group">
									 <label>Choose Image</label>
									    <input type="file" name="image1" class="form-control"/>
									 </div>
									 <div class="form-group">
									 <label>Image title</label>
									    <input type="text" name="name" class="form-control"/>
									 </div>
									 <button class="btn btn-primary"> submit </button>
								  </form>
							   </div>
							</div>
                        </div>
                    </div>
                </div>
				<hr/>
				<div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="panel panel-default">
							<div class="panel-heading">
				
							</div>
							   <div class="panel-body">
							   <div class="table table-responsive">
							      <table class="table table-bordered">
								    <thead>
								
									   <tr>
									     <td> SliderId</td>
									     <td> Slide images</td>
										 
									     <td> Caption text</td>
									     <td> Date</td>
									     <td> delete</td>
									   </tr>
									</thead>
								<tbody>
								<?php
                                   //include('../../manage/manage.database.php');
								   $select="select * from bottomslider";
								   $q=mysqli_query($conn,$select) or die('Error');
								   while($row=mysqli_fetch_array($q,MYSQLI_BOTH))
								   {
									?>
									<tr>
									 <td><?php echo $row['0']; ?></td>
									 <td><img src="../../images/slider/<?php echo $row['1'];?>" style="height:100px; width:100px;"/></td>
									 <td><?php echo $row['2'];?></td>
									 <td><?php echo $row['3'];?></td>
									 <td><a href="editslider.php?flag=3&&id=<?php echo $row['0'];?>">delete</a>  </td>
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
