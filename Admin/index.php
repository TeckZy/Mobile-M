F
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/Icon Mobile M.png">
    <title>Admin Login @ Mobilem.in</title>
    <link href="webadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet" />
    <link href="webadmin/css/animate.css" rel="stylesheet" />
    <link href="webadmin/css/style.css" rel="stylesheet" />
    <link href="webadmin/css/colors/blue.css" id="theme" rel="stylesheet" />
</head>

<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="manage/manage.adminlogin.php"
                    method="post">
                    <a href="javascript:void(0)" class="text-center db">
                        <img src="../images/Mobile%20M%20logo.png" alt="Home" class="img-responsive" />
                    </a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="email" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required=""
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Log In</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>



    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="webadmin/bootstrap/dist/js/tether.min.js"></script>
    <script src="webadmin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="webadmin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="webadmin/js/jquery.slimscroll.js"></script>
    <script src="webadmin/js/waves.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="webadmin/js/custom.min.js"></script>
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

</body>

</html>
