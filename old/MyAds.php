
<!DOCTYPE html>
<html>
<head>
<?php 
include('link.php');
?>
 
</head>
<body>
   <?php
        if(!isset($_SESSION["LoginID"]))
        {
            header("location:index.php?msg=access");
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
				<li class="active">Check Out page</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Ads..</h3>
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<!-------cart -------------------------->
				<div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        
                        <tr>
                            <th> <h2 style="color:tomato; font-size:20px;"> # </h2></th>
                            <th> <h2 style="color:tomato;font-size:20px;">Ad Title </h2></th>
                            <th> <h2 style="color:tomato;font-size:20px;">Category</h2> </th>
                            <th> <h2 style="color:tomato;font-size:20px;">Price </h2></th>
                            <th> <h2 style="color:tomato;font-size:20px;">Description</h2>  </th>
                            <th> <h2 style="color:tomato;font-size:20px;">Image 1</h2> </th>
                            <th> <h2 style="color:tomato;font-size:20px;">Image 2</h2> </th>
                            <th> <h2 style="color:tomato;font-size:20px;">Image 3 </h2></th>
                            <th> <h2 style="color:tomato;font-size:20px;">Actions</h2> </th>
                        </tr>
                        <?php
						$user=$_SESSION["LoginID"];
                        $sql="select * from ads where Email='$user'";
                        $res=mysqli_query($conn,$sql);
                        $sr=0;
                        while($row=mysqli_fetch_array($res,MYSQLI_BOTH))
                        {
                            $sr++;
                        ?>
                        <tr style="font-size:18px; ">
                            <td><?php echo $sr; ?></td>
                            <td>
                                <?php echo $row["Title"]; ?> <br/>
                                <?php echo $row["SubTitle"]; ?>
								
                            </td>
                            <td>
							 
                                <?php echo $row["Category"]; ?> <br/>
                                <?php echo $row["Brand"]; ?> 
								
                            </td>
                            <td>
                                <i class="fa fa-rupee"></i> <?php echo $row["Price"]; ?>
                            </td>
                            <td> <?php echo $row["Description"]; ?> </td>
                            <td>
                                <img src="adimg/<?php echo $row["Image1"]; ?>" style="height:80px;" /> 
							</td>
                            <td>							
                                <img src="adimg/<?php echo $row["Image2"]; ?>"  style="height:80px;" /> 
							</td>
                            <td>							
                                <img src="adimg/<?php echo $row["Image3"]; ?>" style="height:80px;" />                                 
                            </td>
                            <td>
                                <a href="manage/manage.ad.php?action=del&adid=<?php echo $row['AdID']; ?>" class="btn btn-danger" > <i class="fa fa-trash"></i> </a>
                                
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                    </table>
                    </div>
                </div>
                
            </div>
			
				
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