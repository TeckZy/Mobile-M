<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-info">
            <div class="col-md-3 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
                <h2 class="footer-logo"><a href="index.php"
                        style="color:Tomato; text-shadow:1px 1px black; font-size:20px;">About <b
                            style="color:black; text-shadow:1px 1px white; font-size:20px;">Store</b>
                    </a></h2>
                <p style="text-align: justify; font-size:17px;">MobileM.in is an Online Mobile Market for Users.
                    From this website you can purchase new mobile phones or you can post you ad for old mobile phone.<a
                        href="about.php" class="link1" style="color:red;">&nbsp; &nbsp;More...</a></p>
                <ul style="margin-top:5px;">
                    <li class="pull-right">
                    </li>
                </ul>
                <br />
                <img src="images/Mobile%20M%20logo.png" style="height:50px;" alt="Mobile M logo"
                    class="img-responsive logo" />
            </div>
            <div class="col-md-2 col-md-offset-1 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                <h2 style="color:Tomato; text-shadow:1px 1px black; font-size:20px; ">More Details</h2>
                <center>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <!----	<li><a href="products.php">new</a></li>

						<li><a href="faq.php">FAQ</a></li>
						<li><a href="checkout.php">Wishlist</a></li>
					----->
                        <li><a href="./" class="link1">Privacy Policy</a></li>
                        <li><a href="./" class="link1">T & C</a></li>
                        <li><a href="./" class="link1">Refund Policy</a></li>

                    </ul>
                </center>
            </div>
            <div class="col-md-2 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                <h2 style="color:Tomato; text-shadow:1px 1px black; font-size:20px;">Contact Link</h2>

                <ul>

                    <li><a href="https://www.facebook.com/mobilemlucknow/" target="_blank" class="link2 wow fadeInUp">
                            <img class="img-responsive" src="images/f.jpg"
                                style="height:40px;border-radius:50%;float:left;" /> &nbsp; &nbsp;Facebook</a></li>
                    <br />
                    <li><a href="#" class="link2"> <img class="img-responsive" src="images/t.png"
                                style="height:40px;border-radius:50%;float:left;" /> &nbsp;&nbsp; Twitter</a></li>
                    <br />
                    <li><a href="https://plus.google.com/u/0/111711733413589353055" class="link2"> <img
                                class="img-responsive" src="images/gg.png"
                                style="height:40px;border-radius:50%;float:left;" /> &nbsp;&nbsp;Google+</a></li> <br />
                    <li><a href="#" class="link2"> <img class="img-responsive" src="images/i.png"
                                style="height:40px;border-radius:50%;float:left;" />&nbsp;&nbsp;LinkedIn</a></li> <br />
                    <li><a href="#" class="link2"> <img class="img-responsive" src="images/y.png"
                                style="height:40px;border-radius:50%;float:left;" /> &nbsp; &nbsp;YouTube</a></li>
                    <br />
                </ul>

            </div>
            <div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
                <h2 style="color:Tomato; text-shadow:1px 1px black;font-size:20px;">Contact Information</h2>
                <ul class="address1">
                    <li><i class="fa fa-smile-o"
                            style="font-size:16px; color:Tomato;text-shadow:0px 1px black;"></i>&nbsp;&nbsp;<span>MobileM.in
                            (Mobile Market)</span></li>
                    <li> <i class="fa fa-map-marker"></i>&nbsp;&nbsp;Shop No. UGF D-2, Arif Vikas Chamber, Sector-2,
                        Vikash Nagar, Lucknow, Uttar Pradesh - 226022</li>
                    <li> <i class="fa fa-envelope"></i>&nbsp;&nbsp;mobilemlucknow@gmail.com</li>
                    <li> <i class="fa fa-phone-square"></i>&nbsp;&nbsp;+91-6394777570</li>
                    <li> <i class="fa fa-phone-square"></i>&nbsp;&nbsp;+91-9554387950</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
    <!--//footer-->
    <div class="col-sm-12 wow fadeInUp animated" id="footer2" data-wow-delay=".7s"
        style=" background-color:#353F49;  line-height:55px; margin-top:20px;">
        <div class="col-sm-6" style="color:white; font-family: 'IBM Plex Serif', serif;">
            Copyrights &copy; To <a style="color:white;" href="#"> MobileM.in</a>. All Rights Reserved.
        </div>
        <div class="col-sm-3" style="color:white;font-family: 'IBM Plex Serif', serif;">
            <p class="pull-right">
                <a style="color:white;font-family: 'IBM Plex Serif', serif;" href="./">Home</a>
                &nbsp;

                <a style="color:white;font-family: 'IBM Plex Serif', serif;" href="about.php">About Us</a>
                &nbsp;

                <a style="color:white;font-family: 'IBM Plex Serif', serif;" href="contact.php">Contact Us</a>
            </p>
        </div>
        <div class="col-sm-3">

            <p style="color:white;">Powered by - <a style="color:white;" href="" target="_blank"> Teckzy (P) Ltd.</a>
            </p>
        </div>
    </div>
    <div class="prog">

    </div>
    <script>
    $(document).ready(function() {
        $('.dropdown-trigger').dropdown();
        $('.modal').modal();
        $('select').formSelect();
        $('.tabs').tabs();
        $('.parallax').parallax();
        $('.sidenav').sidenav();
        $('.carousel.carousel-slider').carousel({
            fullWidth: true
        });
        window.setInterval(function() {
            $('.carousel').carousel('next')
        }, 5000)
        $('.fixed-action-btn').floatingActionButton();
    });

    function SUBMIT(formid) {
        event.preventDefault();
        $(".prog").append('<div class="progress"></div>');
        $(".progress").append('<div class="indeterminate"></div>');
        $(".prog").css({
            "display": "flex",
            "align-items": "center",
            "justify-content": "center",
            "background-color": "#eee",
            "position": "fixed",
            "z-index": "999",
            "top": "0",
            "left": "0",
            "right": "0",
            "bottom": "0"
        });


        var post_url = $(formid).attr("action"); //get form action url
        var form_data = $(formid).serialize(); //Encode form elements for submission


        $.post(post_url, form_data, function(response) {
            notify(response);
        });
    }

    function notify(response) {
        try {
            JSON.parse(response);
            var res = JSON.parse(response);
            $(".toast").empty();
            if (res.error) {

                M.toast({
                    html: "<p class=\"toastMSG red-text darken-2\">" + res.message + "</p>",
                    class: "rounded",
                    completeCallback: function() {
                        if (res.redirect) {
                            window.location = res.redirect;
                        }
                    }
                })
            } else {
                M.toast({
                    html: "<p class=\"toastMSG green-text darken-3\">" + res.message + "</p>",
                    class: "rounded",
                    completeCallback: function() {
                        if (res.redirect) {
                            window.location = res.redirect;
                        }
                    }
                })
            }

            $(".prog").css("all", "unset");

        } catch (error) {
            M.toast({
                html: "<p class=\"toastMSG red-text darken-2\">" + error + "</p>",
                class: "rounded",
                completeCallback: function() {
                    $(".prog").css("all", "unset");
                }
            })
        }
    }
    </script>
