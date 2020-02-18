<?php
session_start();
require_once("manage/manage.database.php");

$aa=rand(100000,999999);
$ab=md5($aa);
$ac=substr($ab,0,5);
$ad=strtoupper($ac);
if(!isset($_SESSION["SystemID"]))
{
	$_SESSION["SystemID"]=$ad;
}

?>
        <!-- favivon linking  -->
		<link rel="icon" href="images/Icon Mobile M.png" type="image/png" sizes="16x16" />		
		<!-- Mobile Freindly Code -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
		<!-- Css Style Sheet Linking -->
		<link rel="stylesheet" href="venders/animate/animate.min.css" type="text/css" media="all" />
		<link href="venders/bootstrap/css/bootstrap.css" rel="stylesheet" />
		<link href="venders/font%20awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="venders/hover/hover.css" rel="stylesheet" />
		<link href="venders/jquery%20confirm/css/jquery-confirm.css" rel="stylesheet" />
		<link href="venders/owl%20carousel/css/owl.carousel.css" rel="stylesheet" />
		<link href="venders/owl%20carousel/css/owl.theme.default.css" rel="stylesheet" />
		<link href="venders/spinkit/spinkit.css" rel="stylesheet" />
		<link href="venders/sweetalert/css/sweetalert.css" rel="stylesheet" />
        <link href="venders/sweetalert/css/twitter.css" rel="stylesheet" type="text/css" media="all" />
		<link href="venders/swipebox/css/swipebox.css" rel="stylesheet" />
		<link href="venders/mega menu/css/component.css" rel="stylesheet" />
        <link href="venders/chosen/css/chosen.min.css" rel="stylesheet" />
        <link href="venders/datepicker/css/datepicker.min.css" rel="stylesheet" />

        <link href="venders/validation/css/formValidation.css" rel="stylesheet" />

		<link href="css/style.css" rel="stylesheet" />
		<link href="css/customresponsive.css" rel="stylesheet" />

		<!-- All Scripting file linking -->
		<script src="venders/jquery/jquery-2.1.4.min.js"></script>
		<script src="venders/bootstrap/js/bootstrap.min.js"></script>
		<script src="venders/jquery%20confirm/js/jquery-confirm.min.js"></script>
		<script src="venders/owl%20carousel/js/owl.carousel.min.js"></script>
		<script src="venders/smooth%20scroll/smooth-scroll.js"></script>
		<script src="venders/sweetalert/js/sweetalert.min.js"></script>
		<script src="venders/swipebox/js/jquery.swipebox.js"></script>
		<script src="venders/wow/wow.min.js"></script>
		<script src="venders/mega menu/js/modernizr.custom.js"> </script>
        <script src="venders/chosen/js/chosen.jquery.min.js"></script>
        <script src="venders/datepicker/js/bootstrap-datepicker.min.js"></script>   
        <script src="venders/validation/js/formValidation.min.js"></script>
        <script src="venders/validation/js/framework/bootstrap.js"></script>
        <script src='js/jquery.elevatezoom.js'></script>
        <script src="js/custom.js"></script>
		<script src="js/jquery.form-validator.js"></script>
<script type="text/JavaScript">
		// prepare the form when the DOM is ready 
		$(document).ready(function() {
			$("#gallery li img").hover(function(){
				$('.MM').attr('src',$(this).attr('src').replace('thumb/', ''));
			});
			var imgSwap = [];
			 $("#gallery li img").each(function(){
				imgUrl = this.src.replace('thumb/', '');
				imgSwap.push(imgUrl);
			});
			$(imgSwap).preload();
		});
		$.fn.preload = function() {
			this.each(function(){
				$('<img/>')[0].src = this;
			});
		}
</script>
<script> 
  $(document).ready(function(e) {     
     $('.carousel-indicators li:nth-child(1)').addClass('active'); 
   	 $('.item:nth-child(1)').addClass('active');   
	 }); 
</script> 
<style>
    .text1
    {
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>