<!DOCTYPE html>
<html>

<head>

    <?php
  include('link.php');
  ?>
    <!-- <script>
    $(document).ready(function(e) {
      $('.carousel-indicators li:nth-child(1)').addClass('active');
      $('.item:nth-child(1)').addClass('active');
    });
  </script> -->

    <style>
    .carousel-item img {
        height: 300px;
    }

    </style>

</head>

<body>

    <!-----header---------------->
    <?php
  include('header.php');
  ?>
    <!-- Modal Structure -->
    <div id="loginRegModal" class="modal">
        <a style="float:right;" class="center modal-close waves-effect waves-green btn-flat"><i
                class="fa fa-close"></i></a>
        <?php
	if (!isset($_SESSION["LoginID"])) {

	?>
        <div class="modal-content">
            <div class="container white">
                <div class="row">
                    <ul class="tabs teal">
                        <li class="tab col s6 m6 l6">
                            <a class="white-text active" href="#login">login</a>
                        </li>
                        <li class="tab col s6 m6 l6">
                            <a class="white-text" href="#register">register</a>
                        </li>
                    </ul>

                </div>

                <div id="login" class="col s12">
                    <form id="loginForm" action="manage/manage.customerlogin.php" method="post">
                        <?php
						if (isset($_REQUEST["addcart"])) {
						?>
                        <input type="hidden" value="<?php echo $_REQUEST["addcart"]; ?>" name="pid" />
                        <?php
						}
						?>
                        <?php
						if (isset($_REQUEST["to"])) {
						?>
                        <input type="hidden" value="<?php echo $_REQUEST["to"]; ?>" name="to" />
                        <?php
						}
						?>
                        <div class="input-field col s6">
                            <input required="" aria-required="true" type="text" name="email" class="user" id="email"
                                required />
                            <label for="email">Enter Email</label>
                        </div>

                        <div class="input-field col s6">
                            <input required="" aria-required="true" type="password" name="password" class="lock"
                                id="password" />
                            <label for="password">Enter Password</label>
                        </div>
                        <button onClick="SUBMIT('#loginForm')" class="waves-effect waves-green btn" name="Sign In">Sign
                            In</button>

                    </form>
                    <br>
                    <a class="waves-effect waves-green btn" href="Forget.php"><i>Forget Password</i></a>
                </div>
                <!-- REGISTRATION -->
                <div id="register" class="col s12">
                    <form id="regForm" action="manage/manage.customerregistration.php" method="post" class="col s12">
                        <div class="form-container">
                            <h3 class="teal-text">Welcome</h3>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="text" value="nishu" name="name" id="name" class="validate" />
                                    <label for="name">Full Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <select name="gender" id="gender">
                                        <option value="" disabled>Choose your Gender</option>
                                        <option selected>Male</option>
                                        <option>Female</option>
                                    </select>
                                    <label>Select Gender</label>
                                </div>

                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input type="number" value="7054796555" name="mobile" class="validate"
                                        id="mobile" />
                                    <label for="mobile">Mobile</label>
                                </div>
                                <div class="input-field col s6">
                                    <input type="email" value="nishu@gmail.com" name="email" class="validate"
                                        id="email" />
                                    <label for="email">Email </label>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="password" value="nishu" name="password" class="validate"
                                        id="password" />
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password-confirm" value="nishu" type="password" class="validate" />
                                    <label for="password-confirm">Password Confirmation</label>
                                </div>
                            </div>
                            <center>
                                <button class="btn waves-effect waves-light teal" onClick="SUBMIT('#regForm')"
                                    name="action">
                                    Submit
                                </button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <?php } ?>
        <div class="modal-footer">
        </div>
    </div>

    <!------------header------------------------>
    <!-- Top-Carousel -->
    <div class="section">
        <div class="row">
            <div class="col s12">
                <div class="carousel carousel-slider center">
                    <?php
            $s1 = "select * from slider order by ID desc limit 0,4";
            $q = mysqli_query($conn, $s1) or die('Error');
            $i = 0;
            while ($row = mysqli_fetch_array($q, MYSQLI_BOTH)) {
            ?>

                    <a class="carousel-item" href="#<?php $i = $i + 1;
                                              echo $i ?>!">

                        <img src="images/slider/<?php echo $row[1]; ?>" alt="..." style="width:100%">
                    </a>
                    <?php
            }
            ?>

                </div>
            </div>
        </div>

    </div>

    <div class="parallax-container center valign-wrapper">
        <div class="container">
            <div class="row">
                <div class="col s12 white-text">
                    <h2 class="teal-text teal-text lighten-2">BIG SALE</h2>
                    <p>Get flat 10% Cashback</p>
                    <a class="waves-effect waves-light btn-large teal lighten-2">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="parallax">
            <img src="images/headphone.jpg" />

        </div>
    </div>
    <!-- RECENT PRODUCTS -->
    <div class="section">
        <div class="row">
            <?php
      $sqlproduct = "select * from products order by ProductID desc limit 0,4";
      $resproduct = mysqli_query($conn, $sqlproduct);
      while ($rowproduct = mysqli_fetch_array($resproduct, MYSQLI_BOTH)) {
      ?>
            <div class="col s12 m3 l3 center">
                <a
                    href="single.php?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>">
                    <img style="width:100px; height:200px;" src="Admin/productsimg/<?php echo $rowproduct["Image1"]; ?>"
                        class="responsive-img" alt="">
                </a>
                <div class="card hoverable animate fadeLeft">
                    <div class="card-image">
                        <?php
              if ($rowproduct["Status"] == "In-Stock") {
              ?>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"
                            href="manage/manage.cart.php?action=add&pid=<?php echo $rowproduct["ProductID"]; ?>"
                            style=" font-size:15px;">
                            <i class="fa fa-shopping-cart"></i>

                        </a>
                        <?php
              } else {
              ?>
                        <a href="#" disabled data-toggle="tooltip" data-placement="bottom" title="Add To Cart"></a>
                        <label class="label label-warning">Out of Stock</label>
                        <?php
              }
              ?>
                    </div>
                    <div class="card-content">
                        <span class="card-title truncate"><?php echo $rowproduct["Name"]; ?></span>

                        <div class="display-flex flex-wrap justify-content-center">
                            <?php
                if ($rowproduct["Discount"] > 0) {
                  $dis = $rowproduct["Discount"];
                  $price = $rowproduct["Price"];
                  $disprice = $dis / 100 * $price;
                  $disprice = intval($disprice);
                  $newprice = $price - $disprice;
                ?>
                            <span class="label label-success"
                                style="padding:3px 3px;color:white; text-shadow:0px 1px black;font-size:15px;"><b><?php echo $dis; ?>
                                    % </b></span> &nbsp;
                            <s style="color:Tomato; font-size:11px;"><i class="fa fa-rupee"></i>
                                <?php echo $rowproduct["Price"]; ?></s>
                            <h5 class="mt-3"><i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-</h5>
                            <?php
                } else {
                ?>
                            <h5 class="mt-3"><i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?> /-</h5>
                            <?php
                }
                ?>

                            <a href="single.php?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>"
                                class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4">View</a>
                        </div>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>
    <!--banner-->

    <div class="parallax-container center valign-wrapper">
        <div class="container">
            <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                <div class="col-md-4 offer-footer">
                    <div class="row">
                        <div class="col-4 icon-fot">
                            <i class="fas fa-dolly"></i>
                        </div>
                        <div class="col-8 text-form-footer">
                            <h3>Free Shipping</h3>
                            <p>on orders over $100</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offer-footer my-md-0 my-4">
                    <div class="row">
                        <div class="col-4 icon-fot">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="col-8 text-form-footer">
                            <h3>Fast Delivery</h3>
                            <p>World Wide</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offer-footer">
                    <div class="row">
                        <div class="col-4 icon-fot">
                            <i class="far fa-thumbs-up"></i>
                        </div>
                        <div class="col-8 text-form-footer">
                            <h3>Big Choice</h3>
                            <p>of Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="parallax">
            <img src="images/1.jpg" />
        </div>
    </div>

    <!-- RECENT PRODUCTS -->
    <div class="section">
        <div class="row">
            <?php
      $sqlproduct = "select * from products order by ProductID desc limit 4,8";
      $resproduct = mysqli_query($conn, $sqlproduct);
      while ($rowproduct = mysqli_fetch_array($resproduct, MYSQLI_BOTH)) {
      ?>
            <div class="col s12 m3 l3 center">
                <a
                    href="single.php?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>">
                    <img style="width:100px; height:200px;" src="Admin/productsimg/<?php echo $rowproduct["Image1"]; ?>"
                        class="responsive-img" alt="">
                </a>
                <div class="card hoverable animate fadeLeft">
                    <div class="card-image">
                        <?php
              if ($rowproduct["Status"] == "In-Stock") {
              ?>
                        <a class="btn-floating halfway-fab waves-effect waves-light red"
                            href="manage/manage.cart.php?action=add&pid=<?php echo $rowproduct["ProductID"]; ?>"
                            style=" font-size:15px;">
                            <i class="fa fa-shopping-cart"></i>

                        </a>
                        <?php
              } else {
              ?>
                        <a href="#" disabled data-toggle="tooltip" data-placement="bottom" title="Add To Cart"></a>
                        <label class="label label-warning">Out of Stock</label>
                        <?php
              }
              ?>
                    </div>
                    <div class="card-content">
                        <span class="card-title truncate"><?php echo $rowproduct["Name"]; ?></span>

                        <div class="display-flex flex-wrap justify-content-center">
                            <?php
                if ($rowproduct["Discount"] > 0) {
                  $dis = $rowproduct["Discount"];
                  $price = $rowproduct["Price"];
                  $disprice = $dis / 100 * $price;
                  $disprice = intval($disprice);
                  $newprice = $price - $disprice;
                ?>
                            <span class="label label-success"
                                style="padding:3px 3px;color:white; text-shadow:0px 1px black;font-size:15px;"><b><?php echo $dis; ?>
                                    % </b></span> &nbsp;
                            <s style="color:Tomato; font-size:11px;"><i class="fa fa-rupee"></i>
                                <?php echo $rowproduct["Price"]; ?></s>
                            <h5 class="mt-3"><i class="fa fa-rupee"></i> <?php echo $newprice; ?> /-</h5>
                            <?php
                } else {
                ?>
                            <h5 class="mt-3"><i class="fa fa-rupee"></i> <?php echo $rowproduct["Price"]; ?> /-</h5>
                            <?php
                }
                ?>

                            <a href="single.php?mobile=<?php echo urlencode($rowproduct["Name"]); ?>&id=<?php echo $rowproduct["ProductID"]; ?>"
                                class="mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn btn-block modal-trigger z-depth-4">View</a>
                        </div>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>
    </div>
    <!--banner-->




    <!--//new-->


    <!--//gallery-->
    <!-- Bottom-Carousel -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="carousel carousel-slider center">
                        <?php
            $s1 = "select * from slider order by ID desc limit 0,4";
            $q = mysqli_query($conn, $s1) or die('Error');
            $i = 0;
            while ($row = mysqli_fetch_array($q, MYSQLI_BOTH)) {
            ?>

                        <a class="carousel-item" href="#<?php $i = $i + 1;
                                              echo $i ?>!">

                            <img src="images/slider/<?php echo $row[1]; ?>" alt="..." style="width:100%">
                        </a>
                        <?php
            }
            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
  include('footer1.php');
  ?>



</body>

</html>
