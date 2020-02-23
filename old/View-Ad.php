
<html>
<head>
<title>Mobilem Shop a Ecommerce Online Shopping</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="mobile,old mobile,new mobile,top mobile,best mobile phones" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider1.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:400i" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.js"></script>
<script src="js/modernizr.custom.js"></script>

<script defer src="js/jquery.flexslider.js"></script>

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
<!--flex slider-->
<script src="js/imagezoom.js"></script>
<!--cart-->
<script src="js/simpleCart.min.js"></script>

<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<?php session_start(); ?>
</head>
<body>	

	<?php
	
	include('manage/manage.database.php');
        $id="";
        if(isset($_REQUEST["id"]))
        {
            $id=$_REQUEST["id"];
        }
        else
        {
            header("location:products.php");
        }
		
        ?>


	<!--header-->
	<?php 
	
	
	include('header.php');?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">View-Ad</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--single-page-->
<!---------show images coding---------------------->
  <?php
            $sql1="select * from ads where AdID='$id'";
            $res1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($res1,MYSQLI_BOTH);
         ?>
            
	
	<div class="single">
		<div class="container">
			<div class="single-info">		
				<div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">	
					<div class="flexslider">
						<ul class="slides">
                 
				<li data-thumb="adimg/<?php echo $row1["Image1"]; ?>">
								<div class="thumb-image" > 
								<img src="adimg/<?php echo $row1["Image1"]; ?>" data-imagezoom="true" class="img-responsive" /> </div>
					</li>
				<li data-thumb="adimg/<?php echo $row1["Image2"]; ?>" >
							<div class="thumb-image" > 
							<img src="adimg/<?php echo $row1["Image2"]; ?>" data-imagezoom="true" class="img-responsive" /> </div>
							</li>
                 <li data-thumb="adimg/<?php echo $row1["Image3"]; ?>" >
								<div class="thumb-image" >
								<img src="adimg/<?php echo $row1["Image3"]; ?>" data-imagezoom="true" class="img-responsive" > </div>
							</li>							
				
						</ul>
					</div>
				</div>
				<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
					<h1 id="pdesc" style="color:Tomato;">Products Description</h1>
					<br/>
					 <h2 class="profuctfullviewtitle" style="font-size:18px;color:black;font-family: 'IBM Plex Serif', serif;"> 
                        <?php echo $row1["Title"] ?> 
						</h2>
					<p style="font-size:17px;color:black;margin-top:-10px;">
                        <?php echo $row1["SubTitle"]; ?>
                    </p>
					
                    <p style="font-size:17px;color:black;margin-top:-10px;">City:&nbsp;&nbsp;&nbsp;<?php echo $row1["City"]; ?>  </p>
                    <p style=" font-size:17px;color:black;margin-top:-10px;">Location: &nbsp;&nbsp;&nbsp;<?php echo $row1["Location"]; ?> </p>
                    <p class="pdesc2" style=" font-size:17px;color:black; margin-top:-10px;">
                  
                    <?php echo $row1["Description"] ?>
                    </p>
                    
					 <h4><span style="font-size:22px; color:green;"> Price: </span><i class="fa fa-rupee" style="color:red;"></i> <?php echo $row1["Price"] ?> /-  </h4>
					 
					 <br></br/>
                    <div class="form-group">
                      <!-------  
                        <a href="Contact-Ad.php?adid=<?php //echo $row1["AdID"]; ?>" class="btn btn-primary btn-sm" style="font-family: 'Rozha One', serif; text-shadow:0px 1px black; font-size:15px;">  &nbsp; View Full Details</a>   --------->
						
						
                    </div>
                 <div class="col-sm-12">
				
  	 <?php
            
            $sql1="select * from ads where AdID='$id'";
            $res1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($res1,MYSQLI_BOTH);
            
            $cemail=$row1["Email"];
            
            $sql2="select * from registration where Email='$cemail'";
            $res2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($res2,MYSQLI_BOTH);
                            
            ?>
            				
				 
				   <hr/>
				    <h1 style="font-size:30px; color:Tomato;">Seller Full Details</h1>
					<hr/>
					
				<p style="font-size:18px; color:black;"> 
					    Seller Name - &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row2["Name"]; ?><br/>
                        Seller Email - &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row2["Email"]; ?><br/>
                        Seller Contact -&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<?php echo $row2["Mobile"]; ?><br/>
                        Seller Alt Contact -&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row1["Contact"]; ?><br/>
                        Seller City -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<?php echo $row1["City"]; ?><br/>
                        Seller Location -&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row1["Location"]; ?></p>
						
				 </div>   
                 
				</div>
			   <div class="clearfix"> </div>
			</div>

		</div>
	</div>
	
	<!--//single-page-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--footer-->
<?php  include('footer1.php');?>
</body>
</html>