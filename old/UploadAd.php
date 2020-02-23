
<!DOCTYPE html>
<html>
<head>
<?php include('link.php'); ?>

</head>
<body>
     <?php
            
            if(!isset($_SESSION["LoginID"]))
            {
                header("location:signin.php?to=uploadad");
            }
            $email=$_SESSION["LoginID"];
            
        ?>

        <?php
            $err="";
            $success="";
        
            if(isset($_REQUEST["error"]))
            {
            $err=$_REQUEST['error'];
            }
            if(isset($_REQUEST["success"]))
            {
            $success=$_REQUEST['success'];
            }
            if($err=="otp")
            {
        ?>
        <script>
            $(document).ready(function(){
                swal({
                    title: "Error !",
                    text: "There is some Technical Error in validating your Mobile Number. Please Contact admin or try again leter.",
                    type: "error",
			        confirmButtonText: "Okay" 
		          });	
	       });
        </script>
        <?php
            }   
        ?>
	<!--header-->
	<?php 
	include('header.php');
	?>
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Upload</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<br/>
	 <br/>
	<div class="col-sm-12">
	
	  <center>
	   <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h2 class="title" style="color:Tomato;">Upload Old Mobile Phone</h2>
			<p>  </p>
        </div>
		</center>
	</div>
	 
	 <br/>
	
	<div class="col-sm-12">
	   <form action="manage/manage.ad.php?action=add" method="post" enctype="multipart/form-data" id="f1" class="wow fadeInUp animated" data-wow-delay=".5s">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    
                    <div class="form-group">
                        <label for="title" >Enter Ad Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title for Ad" />
                    </div>
                    
                    <div class="form-group">
                        <label for="category">Select Ad Category</label>
                        <select id="category" name="category" class="form-control" >
                            <option value="">--Select Category--</option>
                            <?php
                            $query1="select * from category order by CategoryID desc";
                            $res1=mysqli_query($conn,$query1);
                            while($row1=mysqli_fetch_array($res1,MYSQLI_BOTH))
                            {
                            ?>
                            <option value="<?php echo $row1['CategoryName']; ?>"><?php echo $row1['CategoryName']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    
                    <input type="hidden" value="true" name="status" />
                    
                    
                    <div class="form-group">
                        <label for="price">Enter Ad Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Ad Price" />
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Enter Ad Description</label>
                        <textarea rows="5" class="form-control" id="description" name="description" placeholder="Enter Description Details for the Ad" ></textarea>
                                   
                    </div>
                    <div class="form-group">
                        <label for="city">Enter City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name" />
                    </div>
                    
                    
                </div>
                <div class="col-sm-5">
                    
                    <div class="form-group">
					  <!-----
                        <label for="subtitle">Enter Title Sub Text</label>
						------------->
                        <input type="hidden" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Sub Title for Ad" />
                    </div>
                    
                     
                    <div class="form-group">
                        <label for="brand">Select Ad Brand</label>
                        <select id="brand" name="brand" class="form-control" >
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
                    
                    
                    <div class="form-group">
                        <label for="location">Enter Location</label>
                        <input type="text" class="form-control" id="location" name="location" />
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="mobilenumber">Enter Contact Number</label>
                        <input type="number" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Contact Number" />
                    </div>
                    
                    <div class="form-group">
                        <label for="image1">Upload Ad Pictures</label>
                        <input type="file" class="form-control" name="image1" id="image1"  accept="image/*"  /> <br/>
                        <input type="file" class="form-control" name="image2" id="image2"  accept="image/*"  /> <br/>
                        <input type="file" class="form-control" name="image3" id="image3"  accept="image/*"  />
                        
                    </div>
                    
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Upload Ad</button>
                    <button type="reset" class="btn btn-warning">Cancel</button>
                    <br/><br/><br/>
                </div>
                <div class="col-sm-3"></div>
            </div>
            </form>
	</div>
	<div class="login-page">
	  <i style="color:white;">.</i>
	</div>
	
	<!--footer-->
	<?php include('footer1.php');?>
	<!--//footer-->				
	
</body>
</html>