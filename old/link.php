
<?php
session_start();
require_once("manage/manage.database.php");

$aa=rand(100000,999999);
$ab=md5($aa);
$ac=substr($ab,0,5);
$ad=strtoupper($ac);
//echo $ad;
if(!isset($_SESSION["SystemID"]))
{
	$_SESSION["SystemID"]=$ad;
}

?>
<link rel="icon" href="images/Icon Mobile M.png" type="image/png" sizes="16x16" />
<title>MobileM a Ecommerce Online Shopping website</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="MobileM  free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<!--link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /-->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />

<!-- <link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif:400i" rel="stylesheet"/>
<!--//Custom Theme files -->
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="css/materialize.min.css">
<!--js-->
<script src="js/jquery.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="js/materialize.min.js"></script>
	  

<script src="js/modernizr.custom.js"></script>

<!--//js-->
<!--cart-->
<script src="js/simpleCart.min.js"></script>


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
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<script src="js/main.js"></script>
<script src="js/jquery.form-validator.js"></script>
	
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
   
	
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
			<script type="text/javascript" id="sourcecode">
				$(function()
				{
					$('.scroll-pane').jScrollPane();
				});
			</script>
	<!-- //the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<style>
    body,
    html {
      height: 100%
    }

    .custIMG {
      height: 500px;
      width: 250px;
      background-attachment: fixed;
    }

    .carousel-item {
      visibility: visible !important;
    }

   

    .navBG:after {
      content: '\A';
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.6);
      opacity: 1;
    }

    .notif {
      position: relative;
      width: 20px;
      bottom: 15px;
      border-radius: 50%;
	}
	

    .pinned {
		background-size: 100%;
	  min-height: 100%;
position: fixed;
z-index: 999;
    }

    .divider {
      height: 50px;
    }


    .form-container {
      padding: 40px;
      padding-top: 10px;
    }

    .confirmation-tabs-btn {
      position: absolute;
    }

    .toast {
      background-color: #eeeeee;
    }
  
  </style>