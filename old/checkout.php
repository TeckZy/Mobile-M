
<!DOCTYPE html>
<html>
<head>
<?php 
include('link.php');
?>
 <?php

 //echo $show=$_SESSION["LoginID"];

		if(!isset($_SESSION["LoginID"]))
            {  
				if(!isset($_SESSION["SystemID"]))
				{
					header("location:signin.php?msg=access");
				}
            }
        ?>
<!--//animation-effect-->
<!--close-button-->
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.cart-header').fadeOut('slow', function(c){
	  		$('.cart-header').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.cart-header1').fadeOut('slow', function(c){
	  		$('.cart-header1').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close2').on('click', function(c){
		$('.cart-header2').fadeOut('slow', function(c){
	  		$('.cart-header2').remove();
		});
	});	  
});
</script>
<!--//close-button-->
<!--start-smooth-scrolling-->

</head>
<body>

	<!--header-->
	<?php 
	
	include('header.php');
	
	?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Check Out page</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s" style="">My Cart..</h3>
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<!-------cart -------------------------->
				
			
            
            <div class="row">
               
                <div class="col-sm-12">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        
                        <tr style="font-size:11px;">
                            <th> <h2 style="color:tomato; font-size:20px;"> # </h2></th>
                            <th> <h2 style="color:tomato; font-size:20px;">Product Pic <h2></th>
                            <th> <h2 style="color:tomato; font-size:20px;">Product Details <h2> </th>
                            <th> <h2 style="color:tomato; font-size:20px;">Quantity<h2> </th>
                            <th> <h2 style="color:tomato; font-size:20px;">Unit Price <h2> </th>
                            <th> <h2 style="color:tomato; font-size:20px;">Sub Total <h2> </th>
                            <th> <h2 style="color:tomato; font-size:20px;">Actions  <h2></th>
                        </tr>
                        <?php
						$email="";
						if(isset($_SESSION["LoginID"]))
						{
							$email = $_SESSION["LoginID"];
						}
						$systemid="";
						if(isset($_SESSION["SystemID"]))
						{
							$systemid=$_SESSION["SystemID"];
						}
                        $sql="select * from cart where (Email='$email' or SystemID='$systemid') and BuyStatus='false'";
                        $res=mysqli_query($conn,$sql);
                        $subtotal=0;
                        $deliverycharge=0;
                        $totalcharge=0;
                        $tax=0;
                        $sr=0;
                        
                        while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                        {
                            $sr++;
                            
                            $pid=$row["ProductID"];
                            $sql1="select * from products where ProductID='$pid'";
                            $res1=mysqli_query($conn,$sql1);
                            $row1=mysqli_fetch_array($res1,MYSQLI_BOTH);
                            
                            
                        ?>
                        <tr style="font-size:18px; color:black;">
                            <td> <?php echo $sr; ?> </td>
                            <td> <img style="height:70px;" src="Admin/productsimg/<?php echo $row1["Image1"]; ?>" class="img-responsive" /> </td>
                            <td> 
                                <u> <?php echo $row1["Name"]; ?> </u> <br/>
                                <small> <?php echo $row1["SubName"]; ?> </small> <br/>
                                <i><?php echo $row1["Category"]; ?></i> <br/>
                                <b> <?php echo $row1["Brand"]; ?> </b>
                            </td>
                            <td>
                                <select class="form-control" name="qty" id="qty" disabled >
                                    <option>1</option><option>2</option><option>3</option>
                                    <option>4</option><option>5</option><option>6</option>
                                    <option>7</option><option>8</option><option>9</option>
                                    <option>10</option>
                                </select>
                            </td>
                            <td>
                                
                                <?php 
                                    
                                    $price=$row1["Price"];
                                    $dis=$row1["Discount"];
                                    $newprice=$row["Price"];
                                    $subtotal=$subtotal+intval($row["SubTotal"]);
                                    if($dis>0)
                                    {
                                ?>
                                <label class="label label-danger"> <?php echo $dis; ?> % </label> &nbsp;&nbsp;
                                <s style="color:#999;"> <i class="fa fa-rupee"></i> <?php echo $price; ?> </s>
                                &nbsp;&nbsp;
                                <i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-
                                <?php
                                    }
                                ?>
                                
                            </td>
                            <td> <i class="fa fa-rupee"></i> <?php echo $row["SubTotal"]; ?> /- </td>
                            <td> <a href="manage/manage.cart.php?action=remove&cartid=<?php echo $row["CartID"]; ?>" class="btn btn-danger" >Remove <i class="fa fa-trash"></i> </a> </td>
                        </tr>
                        
                        <?php
                            
                        }
                        if($sr==0)
                        {
                            ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h1><label class="text-center label label-warning">Your Cart is empty.</label></h1>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        
                        <tr>
                            <td colspan="3">
                                <a href="products.php" class="btn btn-info" > &larr; Continue Shopping </a>
                            </td>
                            <td colspan="4" align="right">
                                
                                <b> Sub Total : </b> <i class="fa fa-rupee"></i> <?php echo $subtotal; ?> /- <br/>
                                <b> Delivery Charge : </b> <i class="fa fa-rupee"></i> <?php echo $deliverycharge; ?> /- <br/>
                                <b> Estimated Tax : </b> <i class="fa fa-rupee"></i> <?php echo $tax; ?> /-  <br/>
                                <b> Total Amount : </b> <i class="fa fa-rupee"></i> <?php $totalcharge=$subtotal+$deliverycharge+$tax; echo $totalcharge; ?> /-
                                
                                <br/>
                                
                                <br/>
								<?php
								if(isset($_SESSION["LoginID"]))
								{
								?>
                                <button onclick="window.location.href='checkout.php?action=checkout'" class="btn btn-success" type="button" >Checkout &rarr;</button>
                                <?php
								}
								else
								{
								?>
								<button disabled onclick="window.location.href='chechout.php?action=checkout'" type="button" class="btn btn-success">Checkout &rarr;</button>
								<br/>
								<label class="label label-danger">To Make order You must </label>
								<a class="btn btn-warning" href="./signin.php">Login</a>
								<?php
								}
								?>
                            </td>
                        </tr>
                        
                    </table>
                    </div>
                </div>
               
                
            </div>
				<?php
            if(isset($_REQUEST['action']) && $_REQUEST["action"]=="checkout")
            {
                $useremail=$_SESSION["LoginID"];
                
                $query3="select * from registration where Email='$useremail'";
                $res3=mysqli_query($conn,$query3);
                $row3=mysqli_fetch_array($res3,MYSQLI_BOTH);
                
             ?>
            <script>
                $(document).ready(function(){
                   $("#ordercity").focus();
                });
            </script>
			 <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    
                    <form action="manage/manage.cart.php?action=order" method="post">
                        <div class="form-group">
                            <label> Enter Name </label>                            
                            <input type="text" value="<?php echo $row3["Name"]; ?>" id="namefororder" name="name" class="form-control" placeholder="Enter Name of Contact Person.." />
                        </div>
                        <div class="form-group">
                            <label> Enter Mobile </label>                            
                            <input type="number" value="<?php echo $row3["Mobile"]; ?>" name="mobile" class="form-control" placeholder="Enter Mobile Number of Contact Person.." />
                        </div>
                        <div class="form-group">
                            <label> Enter Email </label>                            
                            <input type="email" value="<?php echo $row3["Email"]; ?>" name="email" class="form-control" placeholder="Enter Email of Contact Person.." />
                        </div>
                        
                        <div class="form-group">
                            <label> Enter Delivery City </label>                            
                            <input type="text" id="ordercity" name="city" class="form-control" placeholder="Enter City for Delivery.." />
                        </div>
                        <div class="form-group">
                            <label> Enter Delivery Address </label>                            
                            <textarea rows="5" name="address" class="form-control" placeholder="Enter Delivery Address" ></textarea>
                        </div>
                        <div class="form-group">
                            <label> Enter Delivery Area Pincode </label>                            
                            <input type="number" name="pincode" class="form-control" placeholder="Enter Pincode for Delivery.." />
                        </div>
                        <div class="form-group">
                            <label>Total Amount to Pay (<i class="fa fa-rupee"></i>)</label>
                            <input type="text" class="form-control" value="<?php echo $totalcharge; ?>" readonly />
                            <input type="hidden" value="<?php echo $totalcharge; ?>" name="totalcharge" />
                            <input type="hidden" value="<?php echo $subtotal; ?>" name="subtotal" />
                            <input type="hidden" value="<?php echo $deliverycharge; ?>" name="deliverycharge" />
                            <input type="hidden" value="<?php echo $tax; ?>" name="tax" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" >Proceed to Payment</button>
                        </div>
                    </form>
                    
                </div>
                <div class="col-sm-6"></div>
            </div>
            
             <?php
            } 
            			 
            ?>
            
				
				<!-------cart -------------------------->
			</div>
			
					
		</div>
	</div>
	<!--//cart-items-->	
	<?php 
	include('footer1.php');
	?>		
	
</body>
</html>