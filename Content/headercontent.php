<!-- header -->
<?php error_reporting(0);?>
<script>
$(document).ready(function(){
	
	$('#sb1').click(function(){
		$('#form1').removeClass("hidden-xs");
		$('#sb1').addClass("hidden-xs");
	});
	
});
</script>
          <div class="row header headerprefixed" id="header">
                <div class="col-sm-2 logoouter">
                    <a href="./">
                        <img src="images/Mobile%20M%20logo.png" alt="Mobile M Logo" title="Mobile Market Logo" class="img-responsive" />                   
                        <center style="color:#337ab7;">
                        Wish Pure Karne Ke Din Aye
                        </center>
                    </a>
                </div>
				
                <div class="col-sm-5 searchouter text-center">
                   <form method="get"  action="Products" class="form-inline hidden-xs" id="form1">
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon" id="icon1">
                            <i class="fa fa-search"></i>
                          </div>
                          <input type="search" name="search" class="form-control" id="searchbox" placeholder="Ex.. Samsung Galaxy.. etc"/>
                        </div>
                      </div>
                       <button class="btn btn-primary" id="btnbox"> <i class="fa fa-search"></i> Search</button>
                   </form>
              <a id="sb1" class="btn btn-primary hidden-lg hidden-md-hidden-sm btn-sm">
               <i class="fa fa-search"></i>Search
               </a>			
                </div>
				<div class="col-sm-2 text-center">
				 <a href="./Registration" class="btn btn-default" style="margin-top:40px;"> Registration</a>
				 &nbsp; &nbsp; &nbsp; &nbsp;
				<a href="./Login" class="btn btn-default" style="margin-top:40px;"> Login</a> <?php	//echo $_SESSION["SystemID"]; ?>
				</div>
                <div class="col-sm-3 cartouter text-center">
                    
                    <?php
                        $cartcount=0;
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
                        $sqlcart="select count(*) from cart where (Email='$email' or SystemID='$systemid') and BuyStatus='false'";
                        $rescart=mysqli_query($conn,$sqlcart);
                        $rowcart=mysqli_fetch_array($rescart,MYSQL_BOTH);
                        $cartcount=$rowcart['0'];
                                          
                    ?>
                    <a href="Cart" class="btn btn-danger btn-lg">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                    Cart (<?php echo $cartcount; ?>)
                    </a>
                </div>
            </div>
            <!-- // header -->
            <!-- menu -->
            
            <?php
            
            if(!isset($_SESSION["LoginID"]))
            {     
            ?>
<div class="row">
	<nav class="navbar navbar-default" style="border-bottom:2px solid red; margin:0px; padding:0px;" >
	   <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a href="#" style="line-height:50px;">MobileM.in</a>
			</div>
            <div class="row" id="menu" >
				 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul class="nav navbar-nav">
                  
                            <li role="presentation"><a href="./"> Home</a></li>
                            <li role="presentation"><a href="./About-Us"> About Us</a></li>
                            <li role="presentation"><a href="./Products"> Products</a></li>
                            <li role="presentation"><a href="./UploadAd"> Post Mobile Ad</a></li>
                        </ul>
                </div>
            </div>
            </div>
            </nav>
			</div>
            <?php
            }
            else
            {
                ?>
				<div class="row">
	<nav class="navbar navbar-default" style="border-bottom:2px solid red; margin:0px; padding:0px;" >
	   <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a href="#" style="line-height:50px;">MobileM.in</a>
			</div>
            <div class="row" id="menu" >
				 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                   <ul class="nav navbar-nav">
                  
                            <li role="presentation"><a href="./"> Home</a></li>
                            <li role="presentation"><a href="./About-Us"> About Us</a></li>
                            <li role="presentation"><a href="./Products"> Products</a></li>
                            <li role="presentation"><a href="./UploadAd"> Post Mobile Ad</a></li>
						<li role="presentation" class="dropdown">
                          <a href="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            My Account
                            <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">My Orders</a></li>
                            <li><a href="MyAds">My Ads</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="manage/manage.customerlogout.php">Logout</a></li>                            
                          </ul>
                        </li>
                        </ul>
                </div>
            </div>
            </div>
            </nav>
			</div>
          <!-------------------------------------------------------------------->
                       
           
                <?php
            }
    
                ?>


            
            <!-- // menu -->