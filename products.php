<?php 
   include('manage/manage.database.php');
   if(isset($_REQUEST["search"]) && $_REQUEST["search"]=="")
	{
		header('location:./');
	}
	//echo $sandy;
?>

<!DOCTYPE html>
<html>
<head>
<?php include('link.php'); ?>
</head>
<body>
	<!--header-->
	<?php include('header.php'); ?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--products-->
	<div class="products">	 
		<div class="container">
		    <!-----------------leftside------------------------------------>
			<div class="col-md-3 rsidebar" style="margin-top:10px;">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h1 style="color:Tomato;">Product Filter</h1>            
						
					</div>
					<div class="row">
				<div class="col-sm-12">
				<br/>
				<a href="products.php" class="btn btn-success btn-warning">All Products</a>
				<br/>
				
				<h3>Categories</h3>
			<!-------------------start----------------------------------------->
				<?php    
				$select="select * from category order by CategoryID desc";
				$q=mysqli_query($conn,$select) or die('Error');
				while($row=mysqli_fetch_array($q,MYSQLI_BOTH))
				{
					if(isset($_REQUEST["brand"]))
					{
						$brand=$_REQUEST["brand"];
				?>
                  <a href="?categoryid=<?php echo $row[0]; ?>&brand=<?php echo $brand;?>" class="btn btn-default btn-sm"><?php echo $row['1']; ?></a>
				  <?php
					}
					else
					{
				  ?>
				   <a href="?categoryid=<?php echo $row[0]; ?>" class="btn btn-default btn-sm"><?php echo $row['1']; ?></a>
					  <?php  
					}
				  }
				 ?>
				  <br/><Br/>
				  <h3>Brand</h3>
				<!-------------------start----------------------------------------->
				<?php    
				$select1="select * from brand order by BrandID desc";
				$q1=mysqli_query($conn,$select1) or die('Error');
				while($row1=mysqli_fetch_array($q1,MYSQLI_BOTH))
				{
					if(isset($_REQUEST["categoryid"]))
					{
						$catid=$_REQUEST["categoryid"];
				?>
                  <a href="?brand=<?php echo $row1['1']; ?>&categoryid=<?php echo $catid; ?>" class="btn btn-default btn-sm"><?php echo $row1['1']; ?></a>
				  <?php
					}
					else
					{
				  ?>
				   <a href="?brand=<?php echo $row1['1']; ?>" class="btn btn-default btn-sm"><?php echo $row1['1']; ?></a>
				  <?php  
				}
				}
				  ?>
				<br/>
                <h3>Price</h3>
                 <form class="form" action="products.php" method="get">
				    <input type="text" name="from" class="form-control" placeholder="From Price"/><br/>
				    <input type="text" name="to" class="form-control"placeholder="To Price"/><br/>
				    <button class="btn btn-default">Search</button>
				 </form> 				
				  
				</div>
			</div>
					
								 
				</div>
	
			</div>
		    <!-----------------leftside------------------------------------>
		<div class="col-md-9 product-model-sec">
			  
			<?php   
				$sqlproduct="select * from products order by ProductID desc";
				if(isset($_REQUEST["categoryid"]))
				{
					$catid=$_REQUEST["categoryid"];
					$sqlproduct="select * from products where Category='$catid' order by ProductID desc";
				}
				if(isset($_REQUEST["brand"]))
				{
					$brand=$_REQUEST["brand"];
					$sqlproduct="select * from products where Brand='$brand' order by ProductID desc";
				}
				if(isset($_REQUEST["brand"]) && isset($_REQUEST["categoryid"]))
				{
					$brand=$_REQUEST["brand"];
					$catid=$_REQUEST["categoryid"];
					$sqlproduct="select * from products where Brand='$brand' and Category='$catid' order by ProductID desc";
				}
				if(isset($_REQUEST["search"]))
				{
					$product=$_REQUEST["search"];
					//echo $product;
					$sqlproduct="select * from products where Name like '%$product%'";
				}
				if(isset($_REQUEST["from"]) && isset($_REQUEST['to']))
				{
					$from=$_REQUEST["from"];
					//echo $from."<br/>";
					$to=$_REQUEST["to"];
					//echo $to."<br/>";
					$sqlproduct="select * from products where Price>='$from' and Price<='$to'";
				}
				
              
            ?>   			
				<div class="gallery-info">
	<!---------------popular product----------------------->
	    <?php  
            	  $resproduct=mysqli_query($conn,$sqlproduct);
                while($rowproduct=mysqli_fetch_array($resproduct,MYSQLI_BOTH))
                {
		  ?>	
               		  
				<div class="col-md-3 simpleCart_shelfItem gallery-grid product-grids wow flipInY animated" data-wow-delay=".5s" style="margin:9px;">
				 <div class="row" style="height:250px; width:100%;">
					<a href="single.php?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>">
					
					<img  src="Admin/productsimg/<?php echo $rowproduct["Image1"]; ?>" class="img-responsive" alt="" style="height:200px;"/>
					
					</a>	
				 </div>	
				  <div class="row" style="height:120px; width:100%;">
					<div class="gallery-text simpleCart_shelfItem">
						<h6>
						   <span class="text1"><?php echo $rowproduct["Name"]; ?></span>
                         </h6>
						 <h6>
                            <small class="text2"><?php echo $rowproduct["SubName"]; ?></small>
					    </h6>	
						 <?php
                                            if($rowproduct["Discount"]>0)
                                            {
                                                $dis=$rowproduct["Discount"];
                                                $price=$rowproduct["Price"];
                                                $disprice=$dis/100*$price;
                                                $disprice=intval($disprice);
                                                $newprice=$price-$disprice;
                                            ?>
						<p><span class="item_price"></span></p>
						<h4 class="sizes" style="font-family:(font3);"><a href="#"> 
						
						  <span class="label label-success" style="padding:3px 3px; color:white; text-shadow:0px 1px black;font-size:15px;"><b>&nbsp;<?php echo $dis; ?> % </b></span> &nbsp;
                                            <s style="color:Tomato; font-size:11px;"><i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?></s> &nbsp;&nbsp;
                                            <i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-                                             
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <i class="fa fa-rupee"></i> <b><?php echo $rowproduct["Price"]; ?> /- </b>
                                            <?php
                                            }
                                            ?>
						
						</a></h4>
					</div>
					</div>
					<div class="row" id="third" style="heigth:20px; width:100%;">
					  <center>
					    <ul>
						
							  <?php
                                        if($rowproduct["Status"]=="In-Stock")
                                        {
                                        ?>
                                      
										 <a href="manage/manage.cart.php?action=add&pid=<?php echo $rowproduct["ProductID"]; ?>" class="btn btn-primary btn-sm" style=" text-shadow:0px 1px black; font-size:15px;"> <i class="fa fa-shopping-cart"></i> <b>Add To Cart</b></a>
                                        <?php
                                        }
                                        else        
                                        {                                   
                                        ?>
                                        <a href="#" disabled ></a> <label class="label label-warning">Out of Stock</label>
                                        <?php
                                        }
                                        ?>
							
						</ul>
						</center>
					</div>
				</div>
				
				<?php 
					}
				?>
				<div class="clearfix"></div>
			</div>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//products-->
	
	<?php include('footer1.php');  ?>
</body>
</html>