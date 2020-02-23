<head>

    <title>Modern Shoppe a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home ::
        w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!--//for-mobile-apps -->
    <!--Custom Theme files -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <!--//Custom Theme files -->
    <!--js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--//js-->
    <!--cart-->
    <script src="js/simpleCart.min.js"></script>
    <!--cart-->
    <!--web-fonts-->
    <link
        href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
    <!--web-fonts-->
    <!--animation-effect-->
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
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
    </script>
    <!--//end-smooth-scrolling-->
</head>

<body>
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
            if($success=="login")
            {
        ?>
    <script>
    $(document).ready(function() {
        swal({
            title: "Success !",
            text: "You are Logged in Successfully.",
            type: "success",
            confirmButtonText: "Okay"
        });
    });
    </script>
    <?php
            }
            if($success=="logout")
            {
        ?>
    <script>
    $(document).ready(function() {
        swal({
            title: "Success !",
            text: "You are successfully logged out.",
            type: "success",
            confirmButtonText: "Okay"
        });
    });
    </script>
    <?php
            }
        ?>
    <!--header-->
    <div class="header">
        <div class="top-header navbar navbar-default">
            <!--header-one-->
            <div class="container">
                <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
                    <p>Welcome to Modern Shoppe <a href="register.html">Register </a> Or <a href="signin.html">Sign In
                        </a></p>
                </div>
                <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
                    <ul>

                        <li><a href="https://www.facebook.com/mobilemlucknow/" target="_blank" class="fa fa-facebook"><i
                                    class="fa fa-facebook"></i> </a></li>

                        <li><a href="#" class="in"><i class="fa fa-linkedin"></i> </a></li>

                        <li><a href="#" class="you"><i class="fa fa-youtube"></i> </a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="header-two navbar navbar-default">
            <!--header-two-->
            <div class="container">
                <div class="nav navbar-nav header-two-left">
                    <ul>

                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:info@example.com">mobilemlucknow@gmail.com</a></li>
                    </ul>
                </div>
                <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
                    <a href="./">
                        <img src="images/Mobile%20M%20logo.png" alt="Mobile M Logo" title="Mobile Market Logo"
                            class="img-responsive" style="height:100px; " />

                        <h1><span class="tag">Wish Pure Karne Ke Din Aye </span></h1>
                    </a>

                </div>
                <div class="nav navbar-nav navbar-right header-two-right">
                    <div class="header-right my-account">
                        <a href="contact.html"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                            CONTACT US</a>
                    </div>
                    <div class="header-right cart">
                        <a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                        <h4><a href="checkout.html">
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
                                <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity"
                                    class="simpleCart_quantity"><?php echo $cartcount; ?></span>)
                                <!-------------cart ---------------------->

                                <!-------------cart end---------------------->
                            </a></h4>
                        <div class="cart-box">
                            <p><a href="Cart" class="simpleCart_empty">Empty cart</a></p>
                            <div class="clearfix"> </div>
                        </div>
                        <?php

							if(!isset($_SESSION["LoginID"]))
							{
							?>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!----Menu start------------------------------------------------>

        <div class="top-nav navbar navbar-default">
            <!--header-three-->
            <div class="container">
                <nav class="navbar" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!--navbar-header-->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav top-nav-info">
                            <!------------menu--------------------->
                            <li><a href="./" class="active">Home</a></li>
                            <li><a href="./About-Us">About Us</a></li>
                            <li><a href="./Products">Products</a></li>
                            <li><a href="./UploadAd">Post Mobile Ad</a></li>
                            <!------------end--------------------->
                            <li class="dropdown grid">
                                <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Accessories<b
                                        class="caret"></b></a>
                                <ul class="dropdown-menu multi-column menu-two multi-column3">
                                    <div class="row">
                                        <div class="col-sm-4 menu-grids">
                                            <ul class="multi-column-dropdown">
                                                <li><a class="list" href="products.html">Jewellery</a></li>
                                                <li><a class="list" href="products.html">Hair bands & Clips</a></li>
                                                <li><a class="list" href="products.html">Bangles </a></li>
                                                <li><a class="list" href="products.html">Caps & Belts</a></li>
                                                <li><a class="list" href="products.html">Rain wear</a></li>
                                                <li><a class="list" href="products.html">Bags</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-8 menu-grids">
                                            <a href="products.html">
                                                <div class="new-add">
                                                    <h5>30% OFF <br> Today Only</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </ul>
                            </li>

                            <li><a href="codes.html">Special Offers</a></li>
                        </ul>
                        <div class="clearfix"> </div>
                        <!--//navbar-collapse-->
                        <header class="cd-main-header">
                            <ul class="cd-header-buttons">
                                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                            </ul> <!-- cd-header-buttons -->
                        </header>
                    </div>
                    <!--//navbar-header-->
                </nav>
                <div id="cd-search" class="cd-search">
                    <form>
                        <input type="search" name="search" placeholder="Ex.. Samsung Galaxy.. etc" />
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--//header-->
    <!--banner-->
    <div class="banner">
        <div class="container">
            <div class="banner-text">
                <div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">
                    <h2>On Entire Fashion range</h2>
                    <h3>Coming Soon </h3>
                    <h4>Our New Designs</h4>
                    <div class="count main-row">
                        <ul id="example">
                            <li><span class="hours">00</span>
                                <p class="hours_text">Hours</p>
                            </li>
                            <li><span class="minutes">00</span>
                                <p class="minutes_text">Minutes</p>
                            </li>
                            <li><span class="seconds">00</span>
                                <p class="seconds_text">Seconds</p>
                            </li>
                        </ul>
                        <div class="clearfix"> </div>
                        <script type="text/javascript" src="js/jquery.countdown.min.js"></script>
                        <script type="text/javascript">
                        $('#example').countdown({
                            date: '12/24/2020 15:59:59',
                            offset: -8,
                            day: 'Day',
                            days: 'Days'
                        }, function() {
                            alert('Done!');
                        });
                        </script>
                    </div>

                </div>
                <div class="col-sm-7 banner-right wow fadeInRight animated" data-wow-delay=".5s">
                    <section class="slider grid">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <h4>-30%</h4>
                                    <img src="images/b1.png" alt="">
                                </li>
                                <li>
                                    <h4>-25%</h4>
                                    <img src="images/b2.png" alt="">
                                </li>
                                <li>
                                    <h4>-32%</h4>
                                    <img src="images/b3.png" alt="">
                                </li>
                            </ul>
                        </div>
                    </section>
                    <!--FlexSlider-->
                    <script defer src="js/jquery.flexslider.js"></script>
                    <script type="text/javascript">
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "pagination",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
                    </script>
                    <!--End-slider-script-->
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//banner-->
    <!--new-->
    <div class="new">
        <div class="container">
            <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                <h3 class="title">Recent <span>Products</span></h3>
                </hr>
            </div>
            <div class="new-info">
                <?php
                            $sqlproduct="select * from products order by ProductID desc limit 0,10";
                            $resproduct=mysqli_query($conn,$sqlproduct);
                            while($rowproduct=mysqli_fetch_array($resproduct,MYSQL_BOTH))
                            {
                        ?>
                <div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
                    <div class="new-top">
                        <a
                            href="Product-Full-View?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>">
                            <img class="img-responsive" src="Admin/productsimg/<?php echo $rowproduct["Image1"]; ?>" />

                    </div>
                    <div class="new-bottom">
                        <h5> <span class="text1">hello<?php echo $rowproduct["Name"]; ?></span>
                            <small>hello<?php echo $rowproduct["SubName"]; ?></small>
                        </h5>
                        <div class="ofr">
                            <?php
                                            if($rowproduct["Discount"]>0)
                                            {
                                                $dis=$rowproduct["Discount"];
                                                $price=$rowproduct["Price"];
                                                $disprice=$dis/100*$price;
                                                $disprice=intval($disprice);
                                                $newprice=$price-$disprice;
                                            ?>
                            <span class="label label-danger" style="padding:3px 3px;"><?php echo $dis; ?> %</span>
                            <s style="color:gray;"><i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?></s>
                            &nbsp;&nbsp;
                            <i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-
                            <?php
                                            }
                                            else
                                            {
                                            ?>
                            <i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?> /-
                            <?php
                                            }
                                            ?>
                            <?php
                                        if($rowproduct["Status"]=="In-Stock")
                                        {
                                        ?>
                            <a href="manage/manage.cart.php?action=add&pid=<?php echo $rowproduct["ProductID"]; ?>"
                                class="btn btn-success">Add to Cart</a>
                            <?php
                                        }
                                        else
                                        {
                                        ?>
                            <a href="" class="btn btn-success disabled">Add to Cart</a> <label
                                class="label label-warning">Out of Stock</label>
                            <?php
                                        }
                                        ?>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        ?>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//new-->
    <!--gallery-->
    <div class="gallery">
        <div class="container">
            <div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
                <h3 class="title">Popular<span> Products</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>
            </div>
            <div class="gallery-info">
                <?php
                            $sqlproduct="select * from products order by ProductID desc limit 0,10";
                            $resproduct=mysqli_query($conn,$sqlproduct);
                            while($rowproduct=mysqli_fetch_array($resproduct,MYSQL_BOTH))
                            {
                        ?>


                <div class="col-md-3 gallery-grid wow flipInY animated" data-wow-delay=".5s">
                    <!--------------------------------->
                    <a
                        href="Product-Full-View?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>">
                        <div class="col-sm-12 productgrid wow ZoomIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                            <div class="col-sm-12 product">
                                <div class="col-sm-12 productpic">
                                    <img style="padding:0px 50px;"
                                        src="Admin/productsimg/<?php echo $rowproduct["Image1"]; ?>" />
                                </div>
                                <div class="col-sm-12 productdetails">
                                    <br />
                                    <p class="producttitle">
                                        <span class="text1"><?php echo $rowproduct["Name"]; ?></span>
                                        <br />
                                        <small class="text1"><?php echo $rowproduct["SubName"]; ?></small>
                                    </p>
                                    <p class="productprice">
                                        <?php
                                            if($rowproduct["Discount"]>0)
                                            {
                                                $dis=$rowproduct["Discount"];
                                                $price=$rowproduct["Price"];
                                                $disprice=$dis/100*$price;
                                                $disprice=intval($disprice);
                                                $newprice=$price-$disprice;
                                            ?>
                                        <span class="label label-danger" style="padding:3px 3px;"><?php echo $dis; ?>
                                            %</span>
                                        <s style="color:gray;"><i class="fa fa-rupee"></i>
                                            <?php echo $rowproduct["Price"]; ?></s> &nbsp;&nbsp;
                                        <i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-
                                        <?php
                                            }
                                            else
                                            {
                                            ?>
                                        <i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?> /-
                                        <?php
                                            }
                                            ?>
                                    </p>
                                </div>
                                <div class="col-sm-12">

                                    <?php
                                        if($rowproduct["Status"]=="In-Stock")
                                        {
                                        ?>
                                    <a href="manage/manage.cart.php?action=add&pid=<?php echo $rowproduct["ProductID"]; ?>"
                                        class="btn btn-success">Add to Cart</a>
                                    <?php
                                        }
                                        else
                                        {
                                        ?>
                                    <a href="" class="btn btn-success disabled">Add to Cart</a> <label
                                        class="label label-warning">Out of Stock</label>
                                    <?php
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!---------------------end------------>

                </div>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--//gallery-->
    <!--trend-->
    <div class="trend wow zoomIn animated" data-wow-delay=".5s">
        <div class="container">
            <div class="trend-info">
                <section class="slider grid">
                    <div class="flexslider trend-slider">
                        <ul class="slides">
                            <li>
                                <div class="col-md-5 trend-left">
                                    <img src="images/t1.png" alt="" />
                                </div>
                                <div class="col-md-7 trend-right">
                                    <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                    <h5>Flat 20% OFF</h5>

                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="col-md-5 trend-left">
                                    <img src="images/t2.png" alt="" />
                                </div>
                                <div class="col-md-7 trend-right">
                                    <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                    <h5>Flat 20% OFF</h5>

                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="col-md-5 trend-left">
                                    <img src="images/t3.png" alt="" />
                                </div>
                                <div class="col-md-7 trend-right">
                                    <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                    <h5>Flat 20% OFF</h5>

                                </div>
                                <div class="clearfix"></div>
                            </li>
                            <li>
                                <div class="col-md-5 trend-left">
                                    <img src="images/t4.png" alt="" />
                                </div>
                                <div class="col-md-7 trend-right">
                                    <h4>TOP 10 TRENDS <span>FOR YOU</span></h4>
                                    <h5>Flat 20% OFF</h5>

                                </div>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!--//trend-->
    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="footer-info">
                <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
                    <h4 class="footer-logo"><a href="index.html">Modern <b>Shoppe</b> <span class="tag">Everything for
                                Kids world </span> </a></h4>
                    <p>© 2016 Modern Shoppe . All rights reserved | Design by <a href="http://w3layouts.com"
                            target="_blank">W3layouts</a></p>
                </div>
                <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                    <h3>Popular</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="products.html">new</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="checkout.html">Wishlist</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
                    <h3>Subscribe</h3>
                    <p>Sign Up Now For More Information <br> About Our Company </p>
                    <form>
                        <input type="text" placeholder="Enter Your Email" required="">
                        <input type="submit" value="Go">
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--//footer-->
    <!--search jQuery-->
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

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
    </script>
    <!--//smooth-scrolling-of-move-up-->
    <!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
