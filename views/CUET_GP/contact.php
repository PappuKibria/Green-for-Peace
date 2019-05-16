<!DOCTYPE html>
<html class="no-js">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="../../resource/images/favicon.png">
    <title>Green For Peace</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template CSS Files
    ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="../../resource/css/bootstrap.min.css">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="../../resource/css/ionicons.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="../../resource/css/animate.css">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="../../resource/css/slider.css">
    <!-- owl craousel css -->
    <link rel="stylesheet" href="../../resource/css/owl.carousel.css">
    <link rel="stylesheet" href="../../resource/css/owl.theme.css">
    <link rel="stylesheet" href="../../resource/css/jquery.fancybox.css">
    <!-- template main css file -->
    <link rel="stylesheet" href="../../resource/css/main.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="../../resource/css/responsive.css">

    <!-- Template Javascript Files
    ================================================== -->
    <!-- modernizr js -->
    <script src="../../resource/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- jquery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- owl carouserl js -->
    <script src="../../resource/js/owl.carousel.min.js"></script>
    <!-- bootstrap js -->

    <script src="../../resource/js/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="../../resource/js/wow.min.js"></script>
    <!-- slider js -->
    <script src="../../resource/js/slider.js"></script>
    <script src="../../resource/js/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="../../resource/js/main.js"></script>
</head>
<body>
<!--
==================================================
Header Section Start
================================================== -->
<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a href="index.php" >
                    <img src="../../resource/images/gplogo.jpg" style="height: 100px;" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>
        <!-- main menu -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php" >Home</a>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Events/events.php">Events</a></li>
                                <li><a href="Events/events_create.php">Create New Event</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Blog/blog.php">Blogs</a></li>
                                <li><a href="Blog/blog_create.php">Create New Blog</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blood Bank <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="blood.php">Blood Bank</a></li>
                                <li><a href="create.php">Join Blood Bank</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members<span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="Member/member.php">Members</a></li>
                                <li><a href="Member/member_create.php">Join as Member</a></li>
                                <li><a href="Admin/admin_login.php">Admin LogIn</a> </li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>


<!--
==================================================
    Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>Contact</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">
                                <i class="ion-ios-index"></i>
                                Home
                            </a>
                        </li>
                        <li class="active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section><!--/#page-header-->


<!--
==================================================
    Contact Section Start
================================================== -->
<section id="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="block">
                    <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Contact With Us</h2>
                    <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                        Send us email if you have any query about us
                    </p>
                    <div class="contact-form">
                        <form id="contact-form" method="post" action="sendemail.php" role="form">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                                <input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
                                <input type="email" placeholder="Your Email" class="form-control" name="email" id="email" >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>
                            </div>


                            <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.4s">
                                <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Send Message">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map-area">
                    <h2 class="subtitle  wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Find Us</h2>
                    <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                        You can find us using google map
                    </p>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.175768449247!2d91.96881151420678!3d22.460028242755072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad2fca34ae5549%3A0x35c88a37b3e90e97!2sChittagong+University+of+Engineering+%26+Technology!5e0!3m2!1sen!2sbd!4v1495477000773" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="row address-details">
            <div class="col-md-3">
                <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                    <i class="ion-ios-location-outline"></i>
                    <h5>Chittagong University of Engineering & Technology</h5>
                </div>
            </div>
           <div class="col-md-3">
                <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".5s">
                    <i class="ion-ios-location-outline"></i>
                    <h5>Pahartoli, Raozan, Chittagong-4349, Bangladesh</h5>
                </div>
            </div>
            <div class="col-md-3">
                <div class="email wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                    <i class="ion-ios-email-outline"></i>
                    <p>greenforpeace.cuet@gmail.com</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="phone wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                    <i class="ion-ios-telephone-outline"></i>
                    <p>01521487551</p>
                </div>
            </div>
        </div>
    </div>
</section>






<!--
==================================================
    Call To Action Section Start
================================================== -->
<section id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h2>
                    <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">If you want to know more about us....</p>
                    <a href="contact.php" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Us</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!--
==================================================
Footer Section Start
================================================== -->
<footer id="footer">
    <div class="container">
        <div class="col-md-8">
            <p class="copyright">Copyright: <span>2017</span> . Design and Developed by GP DEVs</p>
        </div>
        <div class="col-md-4">
            <!-- Social Media -->
            <ul class="social">
                <li>
                    <a href="https://www.facebook.com/ads/growth/aymt/homepage/panel/redirect/?data=%7B%22ad_account_ids%22%3A%5B538407519548669%5D%2C%22object_ids%22%3A%5B370119893078908%2C647795008596018%2C555196371222833%2C382111918565195%2C1826719607571050%2C1876284545931859%2C619792371470960%2C648814571863098%2C538385296278061%5D%2C%22campaign_ids%22%3A%5B%5D%2C%22selected_ad_account_id%22%3A538407519548669%2C%22selected_object_id%22%3A555196371222833%2C%22selected_time_range%22%3A%22%22%2C%22is_panel_collapsed%22%3A0%2C%22is_advertiser_valid%22%3A0%2C%22section%22%3A%22Object+Section%22%2C%22clicked_target%22%3A%22Selected+Object%22%2C%22event%22%3A%22click%22%7D&redirect_url=https%3A%2F%2Fwww.facebook.com%2Fcuetgp%2F%3Fref%3Daymt_homepage_panel" class="Facebook">
                        <i class="ion-social-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="Twitter">
                        <i class="ion-social-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="Linkedin">
                        <i class="ion-social-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="Google Plus">
                        <i class="ion-social-googleplus"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</footer> <!-- /#footer -->

</body>
</html>