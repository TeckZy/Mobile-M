
<!DOCTYPE html>
<html>
<head>
<?php  
include('link.php');
?>
</head>
<body>
	<!--header-->
	<?php include('header.php');?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li><a href="UploadAd.php" style="color:white;">All Ads </a></li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!-----------old phones --------------------->
	  <div class="new">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title" style="font-size:30px; margin-top:-20px;">All Ads <span>Products</span></h3>
				
			</div>
			<hr/>
			<div class="gallery-info" style="margin-top:-20px;">
	<!---------------popular product----------------------->
              <?php
                
                $olddate=date('Y-m-d', strtotime('-30 days'));
                $today=date('Y-m-d');
                                        
                $sqlproduct="select * from ads where AddDate between '$olddate' and '$today' order by AdID desc";
        
                $resproduct=mysqli_query($conn,$sqlproduct);
                while($rowproduct=mysqli_fetch_array($resproduct,MYSQLI_BOTH))
             {
            ?>
				<div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s" style="margin:9px;">
				<center>
				  <div class="row" style="height:240px; width:100%;">
				
					<a href="View-Ad.php?mobile=<?php echo $rowproduct["Title"] ?>&id=<?php echo $rowproduct["AdID"]; ?>">
				    
					 <img class="img-responsive" src="adimg/<?php echo $rowproduct["Image1"]; ?>" style="height:200px; text-align:center;"/>
					 
					</a>
					
				  </div>
				  </center>
                    <div class="row" style="height:120px; width:100%;">				   
					<div class="gallery-text simpleCart_shelfItem">
						
					<h6 class="text1" style=""><?php echo $rowproduct["Title"]; ?>   </h6>
                            						   
                            <h6 class="text2"><?php echo $rowproduct["SubTitle"]; ?> </h6>
						<br/>
						<h4 style="color:black;" >
						<i class="fa fa-rupee" style="color:red;"></i> <?php echo $rowproduct["Price"]; ?>
						</h4>
						
					</div>
					</div>
					 <div class="row" style="height:20px; width:100%; ">
					   <center>
					    <a href="View-Ad.php?id=<?php echo $rowproduct["AdID"]; ?>" class="btn btn-primary btn-sm" style=" text-shadow:0px 1px black; font-size:15px;"> View Full Details</a>
						</center>
					  </div>
				</div>
				<?php 
				
			}
				?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
            
	<!-----------old phones --------------------->
	<!--footer-->
	<?php
include('footer1.php');
	?>
	<!--footer-->
	
</body>
</html>